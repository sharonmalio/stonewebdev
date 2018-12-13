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
namespace Appointments\Form;

use Zend\Form\Form;
use Zend\ServiceManager\ServiceManager;

class ProviderServicesForm extends Form
{

    /**
     *
     * @var ServiceManager
     */
    protected $serviceManager;

    public function init()
    {
        $this->setName('providerservicesform');
        $this->setAttribute('id', 'providerservicesform');
        $this->setAttribute('method', 'post');
        $appointmentService = $this->serviceManager->get('Appointments\Service\Appointments');
        
        $this->add([
            'name' => 'provider_service_id',
            'type' => 'hidden'
        ]);

        $this->add([
            'name' => 'service_name',
            'type' => 'text',
            'options' => [
                'label' => 'Service'
            ],
            'attributes' => [
                'required' => true
            ]
        ]);

        $this->add([
            'name' => 'provider_id',
            'type' => 'Zend\Form\Element\Select',
            'options' => [
                'label' => 'Provider',
                'value_options' => $appointmentService->fetchProviderNames(),
                'attributes' => [
                    'required' => true
                ]
            ]
        ]);
        $this->add([
            'name' => 'duration',
            'type' => 'text',
            'options' => [
                'label' => 'Duration'
            ],
            'attributes' => [
                'required' => true
            ]
        ]);

        $this->add([
            'name' => 'price',
            'type' => 'text',
            'options' => [
                'label' => 'Cost'
            ],
            'attributes' => [
                'required' => true
            ]
        ]);
        $this->add([
            'name' => 'currency',
            'type' => 'Zend\Form\Element\Select',
            'options' => [
                'label' => 'Currency',
                'value_options' => [
                    'Ksh' => 'Ksh ',
                    'dollars' => 'dollars'
                ],
                'attributes' => [
                    'required' => true
                ]
            ]
        ]);

        $this->add([
            'name' => 'description',
            'type' => 'text',
            'options' => [
                'label' => 'Comments'
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Button',
            'attributes' => [
                'value' => 'Add Service',
                'id' => 'submitbutton'
            ]
        ]);
    }

    /**
     *
     * @param ServiceManager $serviceManager
     * @return \Appointments\Form\AppointmentsUsersForm
     */
    public function setServiceManager(ServiceManager $sm)
    {
        $this->serviceManager = $sm;
    }

    /**
     *
     * @return \Zend\ServiceManager\ServiceManager
     */
    public function getServiceManager()
    {
        return $this->serviceManager;
    }
}
