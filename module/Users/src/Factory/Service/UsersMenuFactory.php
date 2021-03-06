<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    Moses Ndiritu
* @since     31-10-2018
*/

namespace Users\Factory\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Users\Service\UsersMenu;

class UsersMenuFactory implements FactoryInterface
{

	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{
		$serviceManager=$container->get('ServiceManager');
		$service = new UsersMenu();
		$service->setServiceManager($serviceManager);
		return $service;
	}

	/**
	* Create service
	*
	* @param ServiceLocatorInterface $serviceLocator
	* @return mixed
	*/
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$service = new UsersMenu();
		$service->setServiceManager($serviceLocator);
		return $service;
	}
}
