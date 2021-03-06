<?php
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    Moses Ndiritu
 * @since     23-10-2018
 */
namespace Users;

use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

class Module implements ViewHelperProviderInterface
{

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => $this->getModuleServiceFactories()
        ];
    }

    public function getModuleServiceFactories()
    {
        return include __DIR__ . '/../config/module.service.factories.php';
    }

    public function getControllerConfig()
    {
        return [
            'factories' => $this->getModuleControllerFactories(),
            'invokables' => $this->getModuleControllerInvokables()
        ];
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
        return [
            'factories' => $this->getModuleControllerPluginFactories(),
            'invokables' => $this->getModuleControllerPluginInvokables()
        ];
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
        return [
            'factories' => $this->getModuleFormFactories()
        ];
    }

    public function getModuleFormFactories()
    {
        return include __DIR__ . '/../config/module.form.factories.php';
    }

    public function getViewHelperConfig()
    {
        return [
            'aliases' => $this->getModuleViewHelperAliases(),
            'factories' => $this->getModuleViewHelperFactories()
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
