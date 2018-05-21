<?php 

namespace Stonelink;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
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
            'factories' => [
                Model\StonelinkTable::class => function($container) {
                    $tableGateway = $container->get(Model\AlbumTableGateway::class);
                    return new Model\StonelinkTable($tableGateway);
                },
                Model\AlbumTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Stonelink());
                    return new TableGateway('stonelink', $dbAdapter, null, $resultSetPrototype);
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
                        $container->get(Model\StonelinkTable::class)
                        );
                },
           ],
        ];
    }
}


