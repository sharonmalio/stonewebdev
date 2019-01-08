<?php
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    Moses Ndiritu
 * @since     23-10-2018
 */
namespace Users\Service;

use Zend\ServiceManager\ServiceManager;

class Users
{

    protected $serviceManager;

    protected $userTable;

    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    public function setServiceManager(ServiceManager $serviceManager)
    {
        return $this->serviceManager = $serviceManager;
        return $this;
    }

    /*
     * User Table Functions
     */
    public function getUserTable()
    {
        if (! $this->userTable) {
            $sm = $this->getServiceManager();
            $this->userTable = $sm->get('Users\Model\UserTable');
        }
        return $this->userTable;
    }

    public function getUserName($id)
    {
        $user = $this->getUserTable()->getUser($id);
        $username = trim(ucwords($user->first_name)) . ' ' . trim(ucwords($user->second_name));
        return $username;
    }
}
