<?php
namespace Stonelink\Factory\Controller;

use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;
use Stonelink\Controller\ProvidersController;

class ProvidersControllerFactory implements FactoryInterface
{

	/**
	* Create service
	*
	* @param ServiceLocatorInterface $serviceLocator
	* @return mixed
	*/
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
     
    }
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$serviceManager = $serviceLocator->getServiceLocator();
		$controller = new ProvidersController();
		return $controller;
	}
   

}
