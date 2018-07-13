<?php
namespace Application\Factory\Controller\Plugin;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Controller\Plugin\User;
class UserFactory implements FactoryInterface
{

	/**
	* Create service
	*
	* @param ServiceLocatorInterface $serviceLocator
	* @return mixed
	*/
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$plugin = new User();
		$plugin->setServiceManager($serviceLocator->getServiceLocator());
		return $plugin;
	}

}
