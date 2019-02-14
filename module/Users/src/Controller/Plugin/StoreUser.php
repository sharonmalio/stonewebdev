<?php
namespace Users\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\ServiceManager\ServiceManager;
use Stonebase\Sessions\Sessions as StoneSession;

class StoreUser extends AbstractPlugin
{

    protected $userTable;

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
    }

    public function storeAll($id)
    {
        if ($id) {
            $user = $this->getUserDetails($id);
            foreach ($user as $k => $v) {
                $this->getStoneSession()->storeSession(array(
                    $k => $v
                ), 'user');
            }
        }
    }

    public function storeAuthenticatedUser($id)
    {
        if ($id) {
            $user = $this->getUserDetails($id);
            foreach ($user as $k => $v) {
                $this->getStoneSession()->storeSession(array(
                    $k => $v
                ), 'authenticated_user');
            }
        }
    }

    public function isSetId($id, $redirectroute, $action)
    {
        try {
            if ($id) { // $id => user_id
                $this->storeAll($id);
            } else {
                $this->getController()
                    ->flashMessenger()
                    ->addErrorMessage("User with Id $id not found!")
                    ->setNamespace('error');
                return $this->getController()
                    ->plugin('redirect')
                    ->toRoute($redirectroute, array(
                    'action' => $action
                ));
            }
        } catch (\Exception $e) {
            $this->getController()
                ->flashMessenger()
                ->addErrorMessage("User with Id $id not found!")
                ->setNamespace('error');
            return $this->getController()
                ->plugin('redirect')
                ->toRoute($redirectroute, array(
                'action' => $action
            ));
        }
    }

    public function getUserDetails($id)
    {
        $supplier = $this->getUserTable()->getUser($id);
        return $supplier;
    }

    public function getStoneSession()
    {
        $mendsession = new StoneSession();
        return $mendsession;
    }

    public function getUserTable()
    {
        if (! $this->userTable) {
            $this->userTable = $this->getServiceManager()->get('Application\Model\UserTable');
        }
        return $this->userTable;
    }
}