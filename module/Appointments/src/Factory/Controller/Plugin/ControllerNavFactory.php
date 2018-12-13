<?php
namespace Appointments\Factory\Controller\Plugin;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;
use Appointments\Controller\Plugin\ControllerNav;

class ControllerNavFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $plugin = new ControllerNav();
        $plugin->setServiceManager($serviceLocator->getServiceLocator());
        return $plugin;
    }
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $plugin = new ControllerNav();
        $plugin->setServiceManager($container->get('ServiceManager'));
        return $plugin;
    }
}
