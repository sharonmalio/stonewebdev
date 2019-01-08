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

namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    protected $usersService;

    protected $usersMenuService;

    protected $serviceManager;

    public function setUsersService($usersService)
    {
        return $this->usersService = $usersService;
    }

    public function setUsersMenuService($usersMenuService)
    {
        return $this->usersMenuService = $usersMenuService;
    }

    public function setServiceManager($serviceManager)
    {
        return $this->serviceManager = $serviceManager;
    }

    public function indexAction()
    {
        return new ViewModel();
    }
}
