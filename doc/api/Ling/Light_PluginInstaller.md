Ling/Light_PluginInstaller
================
2020-02-07 --> 2021-01-29




Table of contents
===========

- [LightPluginInstallerException](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Exception/LightPluginInstallerException.md) &ndash; The LightPluginInstallerException class.
- [PluginInstallerSynchronizerHelper](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Helper/PluginInstallerSynchronizerHelper.md) &ndash; The PluginInstallerSynchronizerHelper class.
    - [PluginInstallerSynchronizerHelper::synchronizeDatabaseByPlanetDotName](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Helper/PluginInstallerSynchronizerHelper/synchronizeDatabaseByPlanetDotName.md) &ndash; Synchronizes the plugin's table(s) in the database.
- [LightBasePluginInstaller](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller.md) &ndash; The LightBasePluginInstaller class.
    - [LightBasePluginInstaller::__construct](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/__construct.md) &ndash; Builds the LightBasePluginInstaller instance.
    - [LightBasePluginInstaller::setContainer](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/setContainer.md) &ndash; Sets the container.
    - [LightBasePluginInstaller::install](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/install.md) &ndash; Installs the plugin in the light application.
    - [LightBasePluginInstaller::isInstalled](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/isInstalled.md) &ndash; Returns whether the core install phase of the plugin is fully completed.
    - [LightBasePluginInstaller::uninstall](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/uninstall.md) &ndash; Uninstalls the plugin.
    - [LightBasePluginInstaller::getDependencies](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/getDependencies.md) &ndash; Returns the array of dependencies.
    - [LightBasePluginInstaller::getTableScope](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/LightBasePluginInstaller/getTableScope.md) &ndash; Returns the [table scope](https://github.com/lingtalfi/TheBar/blob/master/discussions/table-scope.md) for this planet.
- [PluginInstallerInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface.md) &ndash; The PluginInstallerInterface interface.
    - [PluginInstallerInterface::install](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/install.md) &ndash; Installs the plugin in the light application.
    - [PluginInstallerInterface::isInstalled](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/isInstalled.md) &ndash; Returns whether the core install phase of the plugin is fully completed.
    - [PluginInstallerInterface::uninstall](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/uninstall.md) &ndash; Uninstalls the plugin.
    - [PluginInstallerInterface::getDependencies](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/PluginInstaller/PluginInstallerInterface/getDependencies.md) &ndash; Returns the array of dependencies.
- [LightPluginInstallerService](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService.md) &ndash; The LightPluginInstallerService class.
    - [LightPluginInstallerService::__construct](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/__construct.md) &ndash; Builds the LightPluginInstallerService instance.
    - [LightPluginInstallerService::setOptions](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setOptions.md) &ndash; Sets the options.
    - [LightPluginInstallerService::setContainer](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setContainer.md) &ndash; Sets the container.
    - [LightPluginInstallerService::setOutputLevels](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setOutputLevels.md) &ndash; Sets the outputLevels.
    - [LightPluginInstallerService::setOutput](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/setOutput.md) &ndash; Sets the output.
    - [LightPluginInstallerService::install](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/install.md) &ndash; Installs the planet which [dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) is given.
    - [LightPluginInstallerService::uninstall](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/uninstall.md) &ndash; Uninstalls the plugin which planetDotName is given.
    - [LightPluginInstallerService::isInstallable](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/isInstallable.md) &ndash; Returns whether the given planet is [installable](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).
    - [LightPluginInstallerService::isInstalled](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/isInstalled.md) &ndash; Returns whether the given plugin is installed.
    - [LightPluginInstallerService::installAll](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/installAll.md) &ndash; This method will logic install all plugins found in the current application.
    - [LightPluginInstallerService::uninstallAll](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/uninstallAll.md) &ndash; This method will logic uninstall all plugins found in the current application.
    - [LightPluginInstallerService::messageFromPlugin](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/messageFromPlugin.md) &ndash; Writes a message to the appropriate output.
    - [LightPluginInstallerService::getInstallerInstance](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/getInstallerInstance.md) &ndash; Returns the plugin installer interface instance for the given planetDotName if defined, or null otherwise.
    - [LightPluginInstallerService::hasTable](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/hasTable.md) &ndash; Returns whether the given table exists in the current database.
    - [LightPluginInstallerService::tableHasColumnValue](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/tableHasColumnValue.md) &ndash; Returns whether the given table has an entry where the column is the given column with the value being the given value.
    - [LightPluginInstallerService::fetchRowColumn](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/Service/LightPluginInstallerService/fetchRowColumn.md) &ndash; Returns the value of the given column in the given table, matching the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
- [TableScopeAwareInterface](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/TableScope/TableScopeAwareInterface.md) &ndash; The TableScopeAwareInterface interface.
    - [TableScopeAwareInterface::getTableScope](https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/api/Ling/Light_PluginInstaller/TableScope/TableScopeAwareInterface/getTableScope.md) &ndash; Returns the [table scope](https://github.com/lingtalfi/TheBar/blob/master/discussions/table-scope.md) for this planet.


Dependencies
============
- [Light](https://github.com/lingtalfi/Light)
- [Light_DbSynchronizer](https://github.com/lingtalfi/Light_DbSynchronizer)
- [UniverseTools](https://github.com/lingtalfi/UniverseTools)
- [Light_Database](https://github.com/lingtalfi/Light_Database)
- [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase)
- [Bat](https://github.com/lingtalfi/Bat)
- [CliTools](https://github.com/lingtalfi/CliTools)
- [CyclicChainDetector](https://github.com/lingtalfi/CyclicChainDetector)
- [SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper)


