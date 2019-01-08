<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Application;

use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\MvcEvent;

class Module
{

    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap(MvcEvent $e)
    {
        $sm = $e->getApplication()->getServiceManager();
        $sharedEventManager = $e->getApplication()
            ->getEventManager()
            ->getSharedManager();
        $sharedEventManager->attach('ZfcUser\Form\Register', 'init', function ($e) use ($sm) {
            
            $sm->get('ControllerPluginManager')
            ->get(Controller\Plugin\ZfcUserExtend::class)
                ->extendUserRegisterForm($e);
        }, 2);
           
    }
    
    public function init(ModuleManager $moduleManager)
    {
        $moduleManager->loadModule('ZfcUser');
    }
}
