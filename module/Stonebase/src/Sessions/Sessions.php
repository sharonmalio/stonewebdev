<?php
namespace Stonebase\Sessions;

use Zend\ServiceManager\ServiceManager;
use Zend\Session\Container;

class Sessions
{

    protected $serviceManager;

    public function storeSession(array $data, $containerName)
    {
        $session = new Container($containerName);
        foreach ($data as $itemName => $value) {
            $session->$itemName = $value;
        }
    }

    public function storeSingleItem($ItemName, $ItemValue, $containerName)
    {
        $session = new Container($containerName);
        $session->$ItemName = $ItemValue;
    }

    public function retreiveSession($sessionName, $containerName)
    {
        $session = new Container($containerName);
        $item = $session->$sessionName;
        return $item;
    }

    public function retrieveSession($sessionName, $containerName)
    {
        $session = new Container($containerName);
        $item = $session->$sessionName;
        return $item;
    }

    public function getEntireSession($containerName)
    {
        $session = new Container($containerName);
        return $session;
    }

    public function destroySession($containerName)
    {
        $session = new Container($containerName);
        $session->getManager()
            ->getStorage()
            ->clear($containerName);
    }

    public function destroySessionItem($itemName, $containerName)
    {
        $session = new Container($containerName);
        unset($session->$itemName);
    }

    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
        return $this;
    }
}