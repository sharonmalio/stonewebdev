<?php
namespace Stonelink\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Stonelink\Model\KenyaMaps2015HealthFacilitiesTable;
use Stonelink\Form\AppointmentForm;

class AppointmentsController extends AbstractActionController
{

    // Add this property:
    private $table;

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
    
    public function editappointmentAction()
    {}

    public function appointmentAction()
    {}
}