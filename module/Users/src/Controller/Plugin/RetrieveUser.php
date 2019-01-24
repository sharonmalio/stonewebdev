<?php
namespace Users\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Stonebase\Sessions\Sessions as StoneSession;
use Zend\ServiceManager\ServiceManager;

class RetrieveUser extends AbstractPlugin
{

    protected $userTable;

    protected $dbAdapter;

    protected $tableName = 'user';

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

    /**
     *
     * @return object|array
     */
    public function getDbAdapter()
    {
        if (! $this->dbAdapter) {
            $this->dbAdapter = $this->getServiceManager()->get('Zend\Db\Adapter\Adapter');
        }
        return $this->dbAdapter;
    }

    public function getStoneSession()
    {
        $mendsession = new StoneSession();
        return $mendsession;
    }

    public function getUserId()
    {
        $auth = $this->getController()->StoneUserAuthentication();
        if ($auth->hasIdentity()) {
            return $auth->getIdentity()->getId();
        }
    }

    public function getStoredId()
    {
        $session = new StoneSession();
        $id = (int) $session->retrieveSession('user_id', 'user');
        return $id;
    }

    public function getLoggedUserId()
    {
        $auth = $this->getController()->StoneUserAuthentication();
        if ($auth->hasIdentity()) {
            return $auth->getIdentity()->getId();
        }
    }

    public function getLoggedUserRole()
    {
        $auth = $this->getController()->StoneUserAuthentication();
        if ($auth->hasIdentity()) {
            return $auth->getIdentity()->getRole();
        }
    }

    public function getUser($id)
    {
        $observation = $this->getUserTable()->getUser($id);
        return $observation;
    }

    public function getUserName($id)
    {
        $user = $this->getUserTable()->getUser($id);
        $username = trim(ucwords($user->first_name)) . ' ' . trim(ucwords($user->second_name));
        return $username;
    }

    public function getCellPhone($id)
    {
        $user = $this->getUserTable()->getUser($id);
        return $user->cell_phone;
    }

    public function getTelePhone($id)
    {
        $user = $this->getUserTable()->getUser($id);
        return $user->cell_phone;
    }

    public function getLoggedUsername()
    {
        return $this->getUserName($this->getuserId());
    }

    public function getUserTable()
    {
        if (! $this->userTable) {
            $this->userTable = $this->getServiceManager()->get('Application\Model\UserTable');
        }
        return $this->userTable;
    }

    /**
     *
     * @param mixed $fieldname
     * @param mixed $fieldvalue
     * @return boolean
     */
    public function recordExists($fieldname, $fieldvalue)
    {
        $validator = new \Zend\Validator\Db\RecordExists(array(
            'table' => $this->tableName,
            'field' => $fieldname,
            'adapter' => $this->getDbAdapter()
        ));
        if ($validator->isValid($fieldvalue)) {
            // field value appears to be valid
            return true;
        } else {
            return false;
        }
    }
}