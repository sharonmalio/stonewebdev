<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2019 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    smalio
* @since     24-01-2019
*/

namespace Stonebase\Factory\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Stonebase\Service\Stonebase;

class StonebaseFactory implements FactoryInterface
{

	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{
		$serviceManager=$container->get('ServiceManager');
		$service = new Stonebase();
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
		$service = new Stonebase();
		$service->setServiceManager($serviceLocator);
		return $service;
	}
}
