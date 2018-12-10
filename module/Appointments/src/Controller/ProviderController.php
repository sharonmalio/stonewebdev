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
use Appointments\Model\ProviderServices;

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

        $form = $formElementManager->get('Appointments\Form\ProviderServicesForm');

        $providerservicesTable = $this->serviceManager->get('Appointments\Model\ProviderServicesTable');

        // instantiate AppointmentForm and set the label on the submit button to "Add"
        // $form = new AppointmentsUsersForm();
        $form->get('submit')->setValue('Add');

        // If the request is not a POST request, then no form data has been
        // submitted, and we need to display the form
        $request = $this->getRequest();
        // echo $request->isPost();
        // exit();
        if ($request->isPost()) {

            $providerService = new ProviderServices();

            $form->setData($request->getPost());

            $form->setInputFilter($providerService->getInputFilter());

            if ($form->isValid()) {
                $providerService->exchangeArray($form->getData());
                // Inserting appointment data in the database table
                $user_id = $providerservicesTable->saveProviderServices($providerService);

                // return $this->redirect()->toRoute('appointments/appointments', array(
                // 'action' => 'selectserviceprovider'
                // ));
            } else {

                return [
                    'form' => $form
                ];
            }
        }
        return [
            'form' => $form
        ];
    }
}
