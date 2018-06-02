<?php 
namespace Stonelink\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Stonelink\Model\KenyaMaps2015HealthFacilitiesTable;
use Stonelink\Model\Appointment;
use Zend\Form;

class StonelinkController extends AbstractActionController
{
    
    // Add this property:
    private $table;
    
    // Add this constructor:
    public function __construct(KenyaMaps2015HealthFacilitiesTable $table)
    {
        $this->table = $table;
    }
    public function __construct(AppointmentTable $table)
    {
        $this->table = $table;
    }
    
    public function indexAction()
    {
        return new ViewModel([
            'hospitals' => $this->table->fetchAll(),
        ]);
    }
    public function addAction()
    {
        //instantiate AppointmentForm and set the label on the submit button to "Add"
        $form = new AppointmentForm();
        $form->get('submit')->setValue('Add');
        //If the request is not a POST request, then no form data has been
        //submitted, and we need to display the form
        $request = $this->getRequest();
        
        if (! $request->isPost()) {
            return ['form' => $form];
        }
        //create an Appointment instance, and pass its input filter on to the form;
        $appointment = new AppointmentForm();
        $form->setInputFilter($appointment->getInputFilter());
        $form->setData($request->getPost());
        
        //if it is invalid return form
        if (! $form->isValid()) {
            return ['form' => $form];
        }
        
        $appointment->exchangeArray($form->getData());
        $this->table->saveAppointment($appointment);
        //we redirect back to the list of appointments using the Redirect
        return $this->redirect()->toRoute('appointment');
    }
    
        
    public function editAction()
    {
        
    }
    
    public function deleteAction()
    {
        
    }
    public function testAction()
    {
        
        echo \Stonelink\Model\KenyaMaps2015HealthFacilitiesTable::class;
        exit;
        
    }
}