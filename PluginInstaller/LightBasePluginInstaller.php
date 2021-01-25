<?php


namespace Ling\Light_PluginInstaller\PluginInstaller;


use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_DbSynchronizer\Helper\LightDbSynchronizerHelper;
use Ling\Light_PluginInstaller\Service\LightPluginInstallerService;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;
use Ling\UniverseTools\PlanetTool;

/**
 * The LightBasePluginInstaller class.
 *
 * This class provides a default PluginInstallerInterface implementation,
 *
 * with methods based around various concepts:
 *
 * - [Light standard permissions](https://github.com/lingtalfi/TheBar/blob/master/discussions/light-standard-permissions.md).
 * - [create file](https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md)
 *
 *
 * Here is what the default implementation provided by this class will do:
 *
 * Install
 * ---------
 * So when a plugin is installed, if it has a **create file**, then the tables listed in the create file are installed.
 * Also, we insert the **light standard permissions** for this plugin in the database.
 *
 * Uninstall
 * ---------
 * When the plugin is uninstalled, if it has a **create file**, the tables listed in the create file are removed.
 * Also, we remove the **light standard permissions** for this plugin from the database.
 *
 *
 * IsInstalled
 * ---------
 * We detect whether the plugin is installed by looking at the **light standard permissions**.
 * If those permissions exist for the plugin, then we consider it's installed, otherwise we consider it's not installed.
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */
class LightBasePluginInstaller implements PluginInstallerInterface, LightServiceContainerAwareInterface
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * An internal cache for the planet dot name array.
     * @var array|null
     */
    private $dotNameArray;


    /**
     * Builds the LightBasePluginInstaller instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->dotNameArray = null;
    }


    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }



    //--------------------------------------------
    // PluginInstallerInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function install()
    {

        list($galaxy, $planet) = $this->extractPlanetDotName();


        //--------------------------------------------
        // CREATE FILE SYNCHRONIZATION
        //--------------------------------------------
        $this->synchronizeDatabase();


        //--------------------------------------------
        // LIGHT STANDARD PERMISSIONS
        //--------------------------------------------
        if (true === $this->container->has("user_database")) {


            /**
             * @var $userDb LightUserDatabaseService
             */
            $userDb = $this->container->get('user_database');
            $this->debugMsg("inserting light standard permissions ($planet.admin and $planet.user) if they don't exist." . PHP_EOL);

            $userDb->getFactory()->getPermissionApi()->insertPermissions([
                [
                    'name' => $planet . ".admin",
                ],
                [
                    'name' => $planet . ".user",
                ],
            ]);
        }


    }

    /**
     * @implementation
     */
    public function isInstalled(): bool
    {

        //--------------------------------------------
        // LIGHT STANDARD PERMISSIONS
        //--------------------------------------------
        if (true === $this->container->has("user_database")) {
            list($galaxy, $planet) = $this->extractPlanetDotName();
            $permissionName = $planet . ".admin";
            /**
             * @var $userDb LightUserDatabaseService
             */
            $userDb = $this->container->get('user_database');
            if (null !== $userDb->getFactory()->getPermissionApi()->getPermissionIdByName($permissionName)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @implementation
     */
    public function uninstall()
    {
        list($galaxy, $planet) = $this->extractPlanetDotName();


        //--------------------------------------------
        // LIGHT STANDARD PERMISSIONS
        //--------------------------------------------
        $this->debugMsg("Remove light standard permissions ($planet.admin, $planet.user) if any." . PHP_EOL);
        if (true === $this->container->has("user_database")) {

            /**
             * @var $userDb LightUserDatabaseService
             */
            $userDb = $this->container->get('user_database');
            $userDb->getFactory()->getPermissionApi()->deletePermissionByNames([
                $planet . ".admin",
                $planet . ".user",
            ]);
        }


        //--------------------------------------------
        // REMOVE SCOPE TABLES
        //--------------------------------------------
        $tables = $this->getTableScope();
        if ($tables) {
            /**
             * @var $userDb LightDatabaseService
             */
            $db = $this->container->get('database');
            foreach ($tables as $table) {
                $this->debugMsg("Remove table $table." . PHP_EOL);
                try {
                    $db->executeStatement("drop table `$table`");
                } catch (\Exception $e) {
                    $this->warningMsg($e);
                }
            }
        }


    }

    /**
     * @implementation
     */
    public function getDependencies(): array
    {
        return [];
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Writes a message to the debug channel of the plugin installer planet.
     * @param string $msg
     * @throws \Exception
     */
    protected function debugMsg(string $msg)
    {
        $this->message($msg, 'debug');
    }

    /**
     * Writes a message to the info channel of the plugin installer planet.
     *
     * @param string $msg
     * @throws \Exception
     */
    protected function infoMsg(string $msg)
    {
        $this->message($msg, 'info');
    }


    /**
     * Writes a message to the warning channel of the plugin installer planet.
     *
     * @param string $msg
     * @throws \Exception
     */
    protected function warningMsg(string $msg)
    {
        $this->message($msg, 'warning');
    }


    /**
     * Writes a message to the channel of the plugin installer planet.
     *
     * @param string $msg
     * @param string|null $type
     * @throws \Exception
     */
    protected function message(string $msg, string $type = null)
    {
        if (null === $type) {
            $type = 'info';
        }
        list($galaxy, $planet) = $this->extractPlanetDotName();
        $planetDotName = $galaxy . "." . $planet;
        /**
         * @var $pi LightPluginInstallerService
         */
        $pi = $this->container->get('plugin_installer');
        $pi->messageFromPlugin($planetDotName, $msg, $type);
    }


    /**
     * Synchronizes the database with the create file (if any) of this planet.
     *
     * @throws \Exception
     */
    protected function synchronizeDatabase()
    {
        list($galaxy, $planet) = $this->extractPlanetDotName();

        $scope = $this->getTableScope();
        $this->debugMsg("synchronizing <b>create file</b>." . PHP_EOL);
        LightDbSynchronizerHelper::synchronizePlanetCreateFile("$galaxy.$planet", $this->container, [
            'scope' => $scope,
        ]);
    }


    /**
     * Returns the [table scope](https://github.com/lingtalfi/TheBar/blob/master/discussions/table-scope.md) for this plugin.
     *
     * @return array
     * @overrideMe
     */
    protected function registerTableScope(): ?array
    {

    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns an array containing the galaxy name and the planet name of the current instance.
     */
    private function extractPlanetDotName(): array
    {
        if (null === $this->dotNameArray) {
            $className = get_class($this);
            $p = explode('\\', $className);
            $arr[] = array_shift($p); // galaxy
            $arr[] = array_shift($p); // planet
            $this->dotNameArray = $arr;
        }
        return $this->dotNameArray;
    }


    /**
     * Returns the [table scope](https://github.com/lingtalfi/TheBar/blob/master/discussions/table-scope.md) for this plugin.
     *
     * @return array
     */
    private function getTableScope(): array
    {
        $scope = $this->registerTableScope();
        if (null === $scope) {
            list($galaxy, $planet) = $this->extractPlanetDotName();
            $planetDotName = $galaxy . "." . $planet;
            $createFile = $this->container->getApplicationDir() . "/universe/" . PlanetTool::getPlanetSlashNameByDotName($planetDotName) . "/assets/fixtures/create-structure.sql";
            $scope = LightDbSynchronizerHelper::guessScopeByCreateFile($createFile, $this->container);
        }
        return $scope;
    }


}