<?php
namespace Stonelink\Controller;

use Stonelink\Form\AppointmentForm;
use Stonelink\Model\Appointment;
use Stonelink\Model\KenyaMaps2015HealthFacilitiesTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class StonelinkController extends AbstractActionController
{

    // Add this property:
    private $table;

    // Add this constructor:
    public function __construct(KenyaMaps2015HealthFacilitiesTable $table)
    {
        $this->table = $table;
    }

    // public function __construct(AppointmentTable $table)
    // {
    // $this->table = $table;
    // }
    public function indexAction()
    {
        return new ViewModel([
            'hospitals' => $this->table->fetchAll()
        ]);
    }

    public function addAction()
    {
        // instantiate AppointmentForm and set the label on the submit button to "Add"
        $form = new AppointmentForm();
        $form->get('submit')->setValue('Add');
        // If the request is not a POST request, then no form data has been
        // submitted, and we need to display the form
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $appointment = new Appointment();
            $form->setData($request->getPost());
            $form->setInputFilter($appointment->getInputFilter());
            
            if ($form->isValid()) {
                $appointment->exchangeArray($form->getData());
                echo"I am valid";
                exit;
                // Inserting appointment data in the datbase table
                $this->getAppointmentTable()->saveAppointment($appointment);
            } else {
                echo "I am not valid";
                exit();
            }
        }
        // else{
        // echo"not post";
        // exit;
        // }
        return array(
            'form' => $form
        );
        // if it is invalid return form
        // we redirect back to the list of appointments using the Redirect
    }

    public function editAction()
    {}

    public function deleteAction()
    {}
}