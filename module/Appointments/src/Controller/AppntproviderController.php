<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    smalio
* @since     14-12-2018
*/

namespace Appointments\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AppntproviderController extends AbstractActionController
{

    protected $appointmentsService;

    protected $appointmentsMenuService;

    protected $serviceManager;

    public function setAppointmentsService($appointmentsService)
    {
        return $this->appointmentsService = $appointmentsService;
    }

    public function setAppointmentsMenuService($appointmentsMenuService)
    {
        return $this->appointmentsMenuService = $appointmentsMenuService;
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
