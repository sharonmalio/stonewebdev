<?php
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    smalio
 * @since     13-12-2018
 */
namespace Appointments\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class SearchController extends AbstractActionController
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

    public function fetchhealthfacilityAction()
    {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $term = $request->getPost()->term;
        }
        $term = (empty($this->params()->fromPost('term'))) ? $this->params()->fromQuery('term') : $this->params()->fromQuery('term');
     
     
        $columns = array(
            'id' => 'facility_code',
            'name' => 'facility_name'
        );
        $joins = NULL;
        $literals = array(
            "`facility_name` like '%$term%'" => 'AND'
        );
        

        $limit = NULL; // select all matching records
        $group = NULL;
        $order = 'id';
        $buffer = TRUE; // return an object of the ResultSet type
        $having = NULL;
        $result = (strlen($term) < 3) ? NULL : $this->appointmentsService->getAppntHealthFacilityTable()->fetchAllAppntHealthFacility($columns, $joins, $literals, $limit, $group, $order, $buffer, $having);
        
        $result = new JsonModel($result);
        return $result;
    }
}
