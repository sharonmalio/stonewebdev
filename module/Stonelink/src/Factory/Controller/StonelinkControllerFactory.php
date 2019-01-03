<?php
namespace Stonelink\Factory\Controller;

use Interop\Container\ContainerInterface;
use Stonelink\Controller\StonelinkController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class StonelinkControllerFactory implements FactoryInterface
{

	/**
	* Create service
	*
	* @param ServiceLocatorInterface $serviceLocator
	* @return mixed
	*/
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $serviceManager=$container->get('ServiceManager');
        $controller= new StonelinkController();
        $controller->setServiceManager($serviceManager);
        return $controller;
    }
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$serviceManager = $serviceLocator->getServiceLocator();
		$controller = new StonelinkController();
		$controller->setServiceManager($serviceManager);
		return $controller;
	}
   

}
