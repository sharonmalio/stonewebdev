<?php
namespace Appointments\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\ServiceManager\ServiceManager;

class ControllerNav extends AbstractPlugin
{

    /**
     *
     * @var ServiceManager
     */
    protected $serviceManager;

    /**
     *
     * @return ServiceManager
     */
    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
        return $this;
    }

    public function getControllerName()
    {
        $controller = $this->getController()
            ->getEvent()
            ->getRouteMatch()
            ->getParam('controller');
        $names = explode('\\', $controller);
        $controllerName = $names[2];
        return $controllerName;
    }

    public function initializeNav()
    {
        $controller = $this->getController()
            ->getEvent()
            ->getRouteMatch()
            ->getParam('controller');
        $names = explode('\\', $controller);
        $controllerName = $names[2];
        $moduleName = $names[0];
        $action = $this->getController()
            ->getEvent()
            ->getRouteMatch()
            ->getParam('action');
        $this->getController()->layout()->action = $action;
        $this->getController()->layout()->controller = $controllerName;
        $this->getController()->layout()->module = strtolower($moduleName);
    }

    public function getModuleControllerUrlFragment()
    {
        $controller = $this->getController()
            ->getEvent()
            ->getRouteMatch()
            ->getParam('controller');
        $names = explode('\\', $controller);
        $controllerName = $names[2];
        $moduleName = $names[0];
        $action = $this->getController()
            ->getEvent()
            ->getRouteMatch()
            ->getParam('action');
        return strtolower($moduleName) . '/' . strtolower($controllerName);
    }
}