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
    public function __construct(StonelinkTable $table)
    {
        $this->stonelinktable = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'facilities' => $this->stonelinktable->fetchAll(),
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