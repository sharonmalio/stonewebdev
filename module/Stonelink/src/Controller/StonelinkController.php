<?php
namespace Stonelink\Controller;

use Stonelink\Form\AppointmentForm;
use Stonelink\Model\Appointment;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class StonelinkController extends AbstractActionController
{

    protected $serviceManager;

    public function setServiceManager($serviceManager)
    {
        return $this->serviceManager = $serviceManager;
    }

    public function indexAction()
    {
        $stonelinkService=$this->serviceManager->get('Stonelink\Service\Stonelink');
        try {
            return new ViewModel([
                'hospitals' => $stonelinkService->getKenyaMaps2015HealthFacilitiesTable()->fetchAll()
                
            ]);
        } catch (\Exception $exception) {
            die($exception);
        }
    }
    public function searchAction()
    {
        $stonelinkService=$this->serviceManager->get('Stonelink\Service\Stonelink');
        try {
            return new ViewModel([
                'hospitals' => $stonelinkService->getKenyaMaps2015HealthFacilitiesTable()->fetchAll()
            ]);
        } catch (\Exception $exception) {
            die($exception);
        }
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
                // Inserting appointment data in the datbase table
                $this->appointmentTable->saveAppointment($appointment);
            } else {
                
                return array(
                    'form' => $form
                );
            }
        }
        
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