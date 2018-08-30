<?php
namespace Stonelink\Factory\Controller;

use Interop\Container\ContainerInterface;
use Stonelink\Controller\ProvidersController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

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
        $serviceManager=$container->get('ServiceManager');
        $controller= new ProvidersController();
        $controller->setServiceManager($serviceManager);
        return $controller;
    }
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$serviceManager = $serviceLocator->getServiceLocator();
		$controller = new ProvidersController();
		return $controller;
	}
   

}
