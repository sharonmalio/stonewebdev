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

use Appointments\Model\AppointmentsUsers;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Controller\Plugin\Redirect;

class AppointmentsController extends AbstractActionController
{

    protected $serviceManager;

    public function setServiceManager($serviceManager)
    {
        return $this->serviceManager = $serviceManager;
    }

    public function indexAction()
    {}

    public function addpersondetailsAction()
    {
        $formElementManager = $this->serviceManager->get('FormElementManager');
        $form = $formElementManager->get('Appointments\Form\AppointmentsUsersForm');
        $appointmentsTable = $this->serviceManager->get('Appointments\Model\AppointmentsUsersTable');
        // instantiate AppointmentForm and set the label on the submit button to "Add"
        // $form = new AppointmentsUsersForm();
        $form->get('submit')->setValue('Add');

        // If the request is not a POST request, then no form data has been
        // submitted, and we need to display the form
        $request = $this->getRequest();

        if ($request->isPost()) {
         
            $appointment = new AppointmentsUsers();
            $form->setData($request->getPost());
            $form->setInputFilter($appointment->getInputFilter());

            if ($form->isValid()) {
                $appointment->exchangeArray($form->getData());
                // Inserting appointment data in the database table
               $appointmentsTable->saveAppointmentsUsers($appointment);
              
                return $this->redirect()->toRoute('appointments/appointments', [
                    'action'=>'selectserviceprovider'
                ]);
            } else {

                return [
                    'form' => $form
                ];
            }
        }
        $formElementManager = $this->serviceManager->get('FormElementManager');
        return [
            'form' => $formElementManager->get('Appointments\Form\AppointmentsUsersForm')
        ];
    }

    public function selectserviceproviderAction()
    {
      
        $formElementManager = $this->serviceManager->get('FormElementManager');
       // $this->ControllerNav()->initializeNav();
        return [
            'form' => $formElementManager->get('Appointments\Form\AppointmentsServiceProviderForm')
        ];
        echo "testing";
        exit;
    }

    public function configurecalendarAction()
    {
        $formElementManager = $this->serviceManager->get('FormElementManager');
        return [
            'form' => $formElementManager->get('Appointments\Form\AppointmentsCalendarForm')
        ];
    }

    public function confirmsummeryAction()
    {
        $formElementManager = $this->serviceManager->get('FormElementManager');
        return [
            'form' => $formElementManager->get('Appointments\Form\AppointmentsCalendarForm')
        ];
    }

    public function payAction()
    {
        $formElementManager = $this->serviceManager->get('FormElementManager');
        return [
            'form' => $formElementManager->get('Appointments\Form\AppointmentsPhoneForm')
        ];
    }

    public function addAction()
    {}

    public function deleteAction()
    {
        // return $this-> appointments -> $appointmentsService->AppointmentsUsersTable()->fetchAll();
    }

    public function editAction()
    {
        // return $this-> appointments -> $appointmentsService->AppointmentsUsersTable()->fetchAll();
    }
}
