<?php
namespace Stonelink\Factory\Model;

use Stonelink\Model\KenyaMaps2015HealthFacilities;
use Stonelink\Model\KenyaMaps2015HealthFacilitiesTable;
use Zend\Db\TableGateway\TableGateway;
use Zend\Hydrator\ObjectProperty;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class KenyaMaps2015HealthFacilitiesTableFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $serviceManager = $container->get('ServiceManager');
        $db = $serviceManager->get('pgsql');
        $resultSetPrototype = new HydratingResultSet();
        $resultSetPrototype->setHydrator(new ObjectProperty());
        $resultSetPrototype->setObjectPrototype(new KenyaMaps2015HealthFacilities());
        $tableGateway = new TableGateway('kenya_maps_2015_health_facilities', $db, null, $resultSetPrototype);
        $table = new KenyaMaps2015HealthFacilitiesTable($tableGateway);
        return $table;
    }

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $db = $serviceLocator->get('pgsql');
        $resultSetPrototype = new HydratingResultSet();
        $resultSetPrototype->setHydrator(new ObjectProperty());
        $resultSetPrototype->setObjectPrototype(new KenyaMaps2015HealthFacilities());
        $tableGateway = new TableGateway('kenya_maps_2015_health_facilities', $db, null, $resultSetPrototype);
        $table = new KenyaMaps2015HealthFacilitiesTable($tableGateway);
        return $table;
    }
}