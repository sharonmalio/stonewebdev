<?php 
namespace Stonelink\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Stonelink\Model\KenyaMaps2015HealthFacilitiesTable;


class HomeController extends AbstractActionController
{
    
    // Add this property:
    private $table;
    
    // Add this constructor:
    public function __construct(KenyaMaps2015HealthFacilitiesTable $table)
    {
        $this->table = $table;
    }
    
    public function indexAction()
    {
        
    }

    public function addAction()
    {
        
    }
    
    public function editAction()
    {
        
    }
    
    public function deleteAction()
    {
        
    }
}