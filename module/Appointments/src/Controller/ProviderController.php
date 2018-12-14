<?php
namespace Appointments\Controller;

/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license http://stonehmis.afyaresearch.org/license/options License Options
 * @author smalio
 * @since 16-11-2018
 */
use Zend\Mvc\Controller\AbstractActionController;
use Appointments\Model\AppntProviderService;
class ProviderController extends AbstractActionController
{

    protected $serviceManager;

    public function setServiceManager($serviceManager)
    {
        return $this->serviceManager = $serviceManager;
    }

    public function indexAction()
    {}

    public function addproviderservicesAction()
    {
        $formElementManager = $this->serviceManager->get('FormElementManager');
        $form = $formElementManager->get('Appointments\Form\AppntProviderServiceForm');
        $appntProviderServiceTable = $this->serviceManager->get('Appointments\Model\AppntProviderServiceTable');
        // instantiate AppointmentForm and set the label on the submit button to "Add"
        // $form = new AppointmentsUsersForm();
        $form->get('submit')->setValue('Add');
        
        // If the request is not a POST request, then no form data has been
        // submitted, and we need to display the form
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $appointment = new AppntProviderService();
            $form->setData($request->getPost());
            $form->setInputFilter($appointment->getInputFilter());
            
            if ($form->isValid()) {
                $appointment->exchangeArray($form->getData());
                // Inserting service data in the database table
                $appntProviderServiceTable->saveAppntProviderService($appointment);
                
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
            'form' => $formElementManager->get('Appointments\Form\AppointmentsServiceProviderForm')
        ];
    }
}