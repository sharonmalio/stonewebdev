<?php
namespace Stonelink;

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
    
    public function getControllerConfig()
    {
        return [
            'factories' => $this->getModuleControllerFactories()
        ];
    }

    public function getModuleServiceFactories()
    {
        return include __DIR__ . '/../config/module.service.factories.php';
    }
    
    public function getModuleControllerFactories()
    {
        return include __DIR__ . '/../config/module.controller.factories.php';
    }
    
//     public function getControllerConfig()
//     {
//         return [
//             'factories' => [
//                 Controller\StonelinkController::class => function ($container) {
//                     try {
//                         return new Controller\StonelinkController($container->get(Model\KenyaMaps2015HealthFacilitiesTable::class), $container->get(Model\AppointmentTable::class));
//                     } catch (\Exception $e) {
//                         die($e);
//                     }
//                 }
//             ]
        
//         ];
//     }
}


