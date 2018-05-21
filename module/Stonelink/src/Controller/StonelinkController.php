<?php

namespace Stonelink\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

// Add the following import:
use Stonelink\Model\StonelinkTable;


class StonelinkController extends AbstractActionController
{
    
    // Add this property:
    private $table;
    
    // Add this constructor:
    public function __construct(kenya_maps_2015_health_facilities $table)
    {
        $this->kenya_maps_2015_health_facilities = $table;
    }
    
    public function indexAction()
    {
        return new ViewModel([
            'facilities' => $this->kenya_maps_2015_health_facilities->fetchAll(),
        ]);
    }
    
    public function displayAction()
    {
        
    }
    
    public function findnearestAction()
    {
        
    }
    
    public function searchfacilityAction()
    {
        
    }
    public function searchclinicianAction()
    {
        
    }
    
    public function bookappointmentAction()
    {
        
    }
    
    public function payAction()
    {
        
    }
    public function rateAction()
    {
        
    }
}