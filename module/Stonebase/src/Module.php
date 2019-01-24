<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2019 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    smalio
* @since     24-01-2019
*/

namespace Stonebase;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
          'factories' => $this->getModuleServiceFactories()
        );
    }

    public function getModuleServiceFactories()
    {
      return include __DIR__ . '/../config/module.service.factories.php';
    }

    public function getControllerConfig()
    {
      return array(
        'factories' => $this->getModuleControllerFactories(),
        'invokables' => $this->getModuleControllerInvokables(),
      );
    }

    public function getModuleControllerFactories()
    {
      return include __DIR__ . '/../config/module.controller.factories.php';
    }

    public function getModuleControllerInvokables()
    {
      return include __DIR__ . '/../config/module.controller.invokables.php';
    }

    public function getControllerPluginConfig()
    {
      return array(
        'factories' => $this->getModuleControllerPluginFactories(),
        'invokables' => $this->getModuleControllerPluginInvokables(),
      );
    }

    public function getModuleControllerPluginFactories()
    {
      return include __DIR__ . '/../config/module.controller.plugin.factories.php';
    }

    public function getModuleControllerPluginInvokables()
    {
      return include __DIR__ . '/../config/module.controller.plugin.invokables.php';
    }

    public function getFormElementConfig()
    {
      return array(
        'factories' => $this->getModuleFormFactories()
      );
    }

    public function getModuleFormFactories()
    {
      return include __DIR__ . '/../config/module.form.factories.php';
    }
    public function getViewHelperConfig()
    {
      return [
        'aliases' => $this->getModuleViewHelperAliases(),
        'factories' => $this->getModuleViewHelperFactories(),
      ];
    }


    public function getModuleViewHelperFactories()
    {
      return include __DIR__ . '/../config/module.viewhelper.factories.php';
    }


    public function getModuleViewHelperAliases()
    {
      return include __DIR__ . '/../config/module.viewhelper.aliases.php';
    }

}
