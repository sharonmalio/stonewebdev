<?php

namespace Stonechat\Factory\Model;

use Stonechat\Model\Users;
use Stonechat\Model\UsersTable;
use Zend\Db\TableGateway\TableGateway;
use Zend\Hydrator\ObjectProperty;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class UsersTableFactory implements FactoryInterface
{
    
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $serviceManager = $container->get('ServiceManager');
        $db = $serviceManager->get('Zend\Db\Adapter\Adapter');
        $resultSetPrototype = new HydratingResultSet();
        $resultSetPrototype->setHydrator(new ObjectProperty());
        $resultSetPrototype->setObjectPrototype(new Users());
        $tableGateway = new TableGateway('appointment', $db, null, $resultSetPrototype);
        $table = new UsersTable($tableGateway);
        
        return $table;
    }
    
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $db = $serviceLocator->get('Zend\Db\Adapter\Adapter');
        $resultSetPrototype =new HydratingResultSet();
        $resultSetPrototype->setHydrator(new ObjectProperty());
        $resultSetPrototype->setObjectPrototype(new Users());
        $tableGateway = new TableGateway('appointment', $db, null, $resultSetPrototype);
        $table = new UsersTable($tableGateway);
        return $table;
    }
}