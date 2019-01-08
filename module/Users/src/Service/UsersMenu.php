<?php
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    Moses Ndiritu
 * @since     31-10-2018
 */
namespace Users\Service;

use Zend\ServiceManager\ServiceManager;

class UsersMenu
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

    public function getAppConfig()
    {
        return $this->getServiceManager()->get('Config');
    }

    public function getUsersUserMenu()
    {
        $config = $this->getServiceManager()->get('Config');
        return $config['UsersUserMenu'];
    }
}
