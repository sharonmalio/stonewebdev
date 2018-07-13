<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    Sharon Malio
* @since     27-06-2018
*/

namespace Application\Factory\Model;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Hydrator\ObjectProperty;
use Interop\Container\ContainerInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Application\Model\UserTable;
use Application\Model\User;

class UserTableFactory implements FactoryInterface
{

	
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{
		$serviceManager = $container->get('ServiceManager');
		$db = $serviceManager->get('Zend\Db\Adapter\Adapter');
		$resultSetPrototype = new HydratingResultSet();
		$resultSetPrototype->setHydrator(new ObjectProperty());
		$resultSetPrototype->setObjectPrototype(new User());
		$tableGateway = new TableGateway('reg_person',$db,null,$resultSetPrototype);
		$table = new UserTable($tableGateway);
		return $table;
	}

	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$db = $serviceLocator->get('Zend\Db\Adapter\Adapter');
		$resultSetPrototype = new HydratingResultSet();
		$resultSetPrototype->setHydrator(new ObjectProperty());
		$resultSetPrototype->setObjectPrototype(new User());
		$tableGateway = new TableGateway('reg_person',$db,null,$resultSetPrototype);
		$table = new UserTable($tableGateway);
		return $table;
	}
}
