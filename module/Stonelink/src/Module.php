<?php
namespace Stonelink;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Stonelink\StonelinkController;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}