<?php
namespace Stonelink;

use Zend\ModuleManager\ModuleManager;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Mvc\MvcEvent;

class Module implements ConfigProviderInterface
{

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
           'factories' => $this->getModuleServiceFactories()
        ];
    }
    
    public function getControllerConfig()
    {
        return [
            'factories' => $this->getModuleControllerFactories()
        ];
    }

    public function getModuleServiceFactories()
    {
        return include __DIR__ . '/../config/module.service.factories.php';
    }
    
    protected function _initForceSSL() {
        if($_SERVER['SERVER_PORT'] != '443') {
            header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
            exit();
        }
    }
    public function getModuleControllerFactories()
    {
        return include __DIR__ . '/../config/module.controller.factories.php';
    }
    // The "init" method is called on application start-up and
    // allows to register an event listener.
 
    public function init(ModuleManager $manager)
    {
        // Get event manager.
        $eventManager = $manager->getEventManager();
        $sharedEventManager = $eventManager->getSharedManager();
        // Register the event listener method.
        $sharedEventManager->attach(__NAMESPACE__, 'dispatch',
            [$this, 'onDispatch'], 100);
        $sharedEventManager->attach(__NAMESPACE__, 'route',
            [$this, 'onRoute'], 100);
    }
    
    // Event listener method.
    public function onDispatch(MvcEvent $event)
    {
        // Get controller to which the HTTP request was dispatched.
        $controller = $event->getTarget();
        // Get fully qualified class name of the controller.
        $controllerClass = get_class($controller);
        // Get module name of the controller.
        $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
        
        // Switch layout only for controllers belonging to our module.
        if ($moduleNamespace == __NAMESPACE__) {
            $viewModel = $event->getViewModel();
            $viewModel->setTemplate('layout/stonelink-layout');
        }
    }
    
    // The "init" method is called on application start-up and
    // allows to register an event listener.
   
    
    // Event listener method.
    public function onRoute(MvcEvent $event)
    {
        if (php_sapi_name() == "cli") {
            // Do not execute HTTPS redirect in console mode.
            return;
        }
        
        // Get request URI
        $uri = $event->getRequest()->getUri();
        $scheme = $uri->getScheme();
        // If scheme is not HTTPS, redirect to the same URI, but with
        // HTTPS scheme.
        if ($scheme != 'https'){
            $uri->setScheme('https');
            $response=$event->getResponse();
            $response->getHeaders()->addHeaderLine('Location', $uri);
            $response->setStatusCode(301);
            $response->sendHeaders();
            return $response;
        }
    }
//     public function getControllerConfig()
//     {
//         return [
//             'factories' => [
//                 Controller\StonelinkController::class => function ($container) {
//                     try {
//                         return new Controller\StonelinkController($container->get(Model\KenyaMaps2015HealthFacilitiesTable::class), $container->get(Model\AppointmentTable::class));
//                     } catch (\Exception $e) {
//                         die($e);
//                     }
//                 }
//             ]
        
//         ];
//     }
}


