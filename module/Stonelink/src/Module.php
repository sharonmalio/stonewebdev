<?php 

namespace Stonelink;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Stonelink\Model\KenyaMaps2015HealthFacilitiesTable;

use Stonelink\Model\KenyaMaps2015HealthFacilities;



class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\KenyaMaps2015HealthFacilitiesTable::class => function($container) {
                    $tableGateway = $container->get(Model\KenyaMaps2015HealthFacilitiesTable::class);
                    return new Model\KenyaMaps2015HealthFacilitiesTable($tableGateway);
                },
                Model\KenyaMaps2015HealthFacilitiesTable::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\KenyaMaps2015HealthFacilities());
                    //return new TableGateway('kenya_maps_2015_health_facilities', $dbAdapter, null, $resultSetPrototype);
                    $tableGateway = new TableGateway('kenya_maps_2015_health_facilities', $dbAdapter, null, $resultSetPrototype);
                    return new KenyaMaps2015HealthFacilitiesTable($tableGateway);
                },
            ],
        ];
    }
    
    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\StonelinkController::class => function($container) {
                    return new Controller\StonelinkController(
                        $container->get(Model\KenyaMaps2015HealthFacilitiesTable::class)
                        );
                },
                ],
                ];
    }
}


