<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    smalio
* @since     14-12-2018
*/

namespace Appointments\Factory\Model;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Hydrator\ObjectProperty;
use Zend\Db\ResultSet\HydratingResultSet;
use Interop\Container\ContainerInterface;
use Appointments\Model\AppntProviderTable;
use Appointments\Model\AppntProvider;

class AppntProviderTableFactory implements FactoryInterface
{

	/**
	* Invoke
	*
	*@param ContainerInterface $container, $requestedName, *@params array $options = null
	* @return mixed
	*/
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{
		$serviceManager = $container->get('ServiceManager');
		$db = $serviceManager->get('Zend\Db\Adapter\Adapter');
		$resultSetPrototype = new HydratingResultSet();
		$resultSetPrototype->setHydrator(new ObjectProperty());
		$resultSetPrototype->setObjectPrototype(new AppntProvider($db));
		$tableGateway = new TableGateway('appnt_provider',$db,null,$resultSetPrototype);
		$table = new AppntProviderTable($tableGateway);
		return $table;
	}
}
