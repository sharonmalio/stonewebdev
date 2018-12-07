<?php
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    smalio
 * @since     16-11-2018
 */
namespace Appointments\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Appointments\Form\AppointmentsUsersForm;
use Appointments\Model\AppointmentsUsers;

class AppointmentsController extends AbstractActionController
{

    protected $serviceManager;

    public function setServiceManager($serviceManager)
    {
        return $this->serviceManager = $serviceManager;
    }
    public  function indexAction()
    {
        
    }
    
    public function addpersondetailsAction()
    {
        $formElementManager=$this->serviceManager->get('FormElementManager');
        
        return [
            'form' => $formElementManager->get('Appointments\Form\AppointmentsUsersForm')
        ];
    
    }
    public function selectserviceproviderAction()
    {
 
      $formElementManager=$this->serviceManager->get('FormElementManager');
      return [
          'form' => $formElementManager->get('Appointments\Form\AppointmentsServiceProviderForm')
      ];
    }
 
    public function configurecalendarAction()
    {
     
        $formElementManager=$this->serviceManager->get('FormElementManager');
        return [
            'form' => $formElementManager->get('Appointments\Form\AppointmentsCalendarForm')
        ];
       
    }
    public function confirmsummeryAction()
    {
        
        $formElementManager=$this->serviceManager->get('FormElementManager');
        return [
            'form' => $formElementManager->get('Appointments\Form\AppointmentsCalendarForm')
        ];
    }
    
    public function payAction()
    {
        $formElementManager=$this->serviceManager->get('FormElementManager');
        return [
            'form' => $formElementManager->get('Appointments\Form\AppointmentsCalendarForm')
        ];
        
    }
    public function addAction()
    {
        

        // // instantiate AppointmentForm and set the label on the submit button to "Add"
        // $form = new AppointmentsUsersForm();
        // $form->get('submit')->setValue('Add');
        // // If the request is not a POST request, then no form data has been
        // // submitted, and we need to display the form
        // $request = $this->getRequest();

        // if ($request->isPost()) {
        // $appointment = new AppointmentsUsers();
        // $form->setData($request->getPost());
        // $form->setInputFilter($appointment->getInputFilter());

        // if ($form->isValid()) {

        // $appointment->exchangeArray($form->getData());
        // // Inserting appointment data in the datbase table
        // $this->appointmentUsersTable->saveAppointmentsUsers($appointment);
        // } else {

        // return [
        // 'form' => $form
        // ];
        // }
        // }

        // if it is invalid return form
        // we redirect back to the list of appointments using the Redirect
    }

  

    public function deleteAction()
    {
        // return $this-> appointments -> $appointmentsService->AppointmentsUsersTable()->fetchAll();
    }

    public function editAction()
    {
        // return $this-> appointments -> $appointmentsService->AppointmentsUsersTable()->fetchAll();
    }
}
