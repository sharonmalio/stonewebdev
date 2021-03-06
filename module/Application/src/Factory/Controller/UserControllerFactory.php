<?php
namespace Application\Factory\Controller;

use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Controller\UserController;
use Interop\Container\ContainerInterface;

class UserControllerFactory implements FactoryInterface
{

	/**
	* Create service
	*
	* @param ServiceLocatorInterface $serviceLocator
	* @return mixed
	*/
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$serviceManager = $serviceLocator->getServiceLocator();
		$controller = new UserController();
		return $controller;
	}
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $serviceManager = $serviceLocator->getServiceLocator();
        $controller = new UserController();
        return $controller;
    }
    }


