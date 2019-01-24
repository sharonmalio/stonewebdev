<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2019 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    smalio
* @since     24-01-2019
*/

namespace Stonebase\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class StonebaseController extends AbstractActionController
{

    protected $stonebaseService;

    protected $stonebaseMenuService;

    protected $serviceManager;

    public function setStonebaseService($stonebaseService)
    {
        return $this->stonebaseService = $stonebaseService;
    }

    public function setStonebaseMenuService($stonebaseMenuService)
    {
        return $this->stonebaseMenuService = $stonebaseMenuService;
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
