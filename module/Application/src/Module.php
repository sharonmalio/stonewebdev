<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Application;

use Zend\Mvc\MvcEvent;

class Module
{

    const VERSION = '3.0.3-dev';

    public function onBootstrap(MvcEvent $e)
    {
//         $this->initAcl($e);
//         // check ACL
//         $e->getApplication()
//             ->getEventManager()
//             ->attach('route', [
//             $this,
//             'checkAcl'
//         ]);

//         // check login variables
//         $events = $e->getApplication()
//             ->getEventManager()
//             ->getSharedManager();
//         $events->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', [
//             $this,
//             'checkLogin'
//         ]);
        
    }

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function initAcl(MvcEvent $e)
    {
        $acl = new \Zend\Permissions\Acl\Acl();
        $roles = include __DIR__ . '/../config/module.acl.roles.php';
        $allResources = array();
        foreach ($roles as $role => $resources) {
            $role = new \Zend\Permissions\Acl\Role\GenericRole($role);
            $acl->addRole($role);
            $allResources = array_merge($resources, $allResources);
            // adding resources
            foreach ($resources as $resource) {
                if (! $acl->hasResource($resource))
                    $acl->addResource(new \Zend\Permissions\Acl\Resource\GenericResource($resource));
            }
            // adding restrictions
            foreach ($allResources as $resource) {
                $acl->allow($role, $resource);
            }
        }
        // setting to view
        $e->getViewModel()->acl = $acl;
    }

    public function checkAcl(MvcEvent $e)
    {
        $route = $e->getRouteMatch()->getMatchedRouteName();
        $sm = $e->getApplication()->getServiceManager();
        $auth = $sm->get('users_service_authenticationservice');
        if ($auth->getIdentity()) {
            $userRole = $auth->getIdentity()->getRole();
        } else {
            $userRole = 'Guest';
        }
        if (! $e->getViewModel()->acl->isAllowed($userRole, $route)) {

            $this->denyAccess();
        }
    }

    public function denyAccess(MvcEvent $e)
    {
        $router = $e->getRouter();
        $url = $router->assemble([], [
            'name' => 'application/error/denied'
        ]);
        $response = $e->getResponse();
        $response->setStatusCode(302);
        $response->getHeaders()->addHeaderLine('Location', $url);
        $stopCallBack = function ($e) use ($response) {
            $e->stopPropagation(true);
            return $response;
        };

        // attach the "break " as a listener with high priority
        $e->getApplication()
            ->getEventManager()
            ->attache(MvcEvent::EVENT_ROUTE, $stopCallBack, - 10000);
        return $response;
    }

    public function checkLogin(MvcEvent $e)
    {
        $controller = $e->getTarget();
        $userId = $controller->RetriveUser()->getLoggedUserId();
        $controller->StoreUser()->storeAuthenticatedUser($userId);
    }
}
