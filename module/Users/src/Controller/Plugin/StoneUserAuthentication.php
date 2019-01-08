<?php
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    Moses Ndiritu
 * @since     16-11-2018
 */
namespace Users\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\ServiceManager\ServiceManager;

class StoneUserAuthentication extends AbstractPlugin
{

    protected $serviceManager;

    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    public function setServiceManager(ServiceManager $serviceManager)
    {
        return $this->serviceManager = $serviceManager;
        return $this;
    }

    public function getAuthService()
    {
        return $this->getServiceManager()->get('users_service_authenticationservice');
    }

    /**
     * Proxy convenience method
     *
     * @return bool
     */
    public function hasIdentity()
    {
        return $this->getAuthService()->hasIdentity();
    }

    /**
     * Proxy convenience method
     *
     * @return mixed
     */
    public function getIdentity()
    {
        return $this->getAuthService()->getIdentity();
    }

    /**
     * Proxy convenience method
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->getAuthService()
            ->getIdentity()
            ->getId();
    }

    public function login()
    {
        return $this->getController()
            ->redirect()
            ->toRoute('login');
    }

    public function loggedin()
    {
        $this->getController()
            ->flashMessenger()
            ->addInfoMessage("User " . $this->getIdentity()
            ->getDisplayName() . " is already logged in");
        $this->getController()
            ->flashMessenger()
            ->setNamespace('info');
        return $this->getController()
            ->redirect()
            ->toRoute('home');
    }

    public function loggedout()
    {
        $this->getController()
            ->flashMessenger()
            ->addInfoMessage("No User is Logged In!");
        $this->getController()
            ->flashMessenger()
            ->setNamespace('info');
        return $this->getController()
            ->redirect()
            ->toRoute('home');
    }
}
