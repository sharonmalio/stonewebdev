<?php 
namespace Stonelink\Controller;

use Zend\Mvc\Controller\AbstractActionController;

use Zend\View\Model\ViewModel;
use Zend\Form;

use Stonelink\Model\KenyaMaps2015HealthFacilitiesTable;
use Stonelink\Form\AppointmentForm;


class AppointmentsController extends AbstractActionController
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
        return new ViewModel([
            'hospitals' => $this->table->fetchAll(),
        ]);
    }
    //We instantiate AppoinmentForm and set the label on the submit button to "Add"
    public function addAction()
    {
        $form = new AppointmentForm();
        $form->get('submit')->setValue('Add');
        
        $request = $this->getRequest();
        
        if (! $request->isPost()) {
            return ['form' => $form];
        }
        //We create an Appoinment instance, and pass its input filter on to the form
        $appointment = new Appointment();
        $form->setInputFilter($appointment->getInputFilter());
        $form->setData($request->getPost());
        //If form validation fails, we want to redisplay the form
        if (! $form->isValid()) {
            return ['form' => $form];
        }
        
        $appointment->exchangeArray($form->getData());
        $this->table->saveAppointment($appointment);
        return $this->redirect()->toRoute('appointment');
    }
    
    public function editappointmentAction()
    {
        
    }
    
    public function appointmentAction()
    {
        
    }
}