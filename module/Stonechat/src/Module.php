<?php
namespace Stonechat;

use Zend\ModuleManager\Feature\ConfigProviderInterface;


class Module implements ConfigProviderInterface
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
            'factories' => [
                Controller\StonechatController::class => function ($container) {
                    try {
                        return new Controller\StonechatController($container->get(Model\RegPersonTable::class));
                    } 
                    catch (\Exception $e) {
                        die($e);
                    }
                }
                ]
                
                ];
    }
}


