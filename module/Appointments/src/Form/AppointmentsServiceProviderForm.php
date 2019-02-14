<?php
namespace Appointments\Form;

/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license http://stonehmis.afyaresearch.org/license/options License Options
 * @author smalio
 * @since 16-11-2018
 */
use Zend\Form\Form;
use Zend\ServiceManager\ServiceManager;

class AppointmentsServiceProviderForm extends Form
{

    protected $serviceManager;

    public function init()
    {
        $this->setName('appointmentsserviceproviderform');
        $this->setAttribute('id', 'appointmentsserviceproviderform');
        $this->setAttribute('method', 'post');

        $this->add([
            'name' => 'appointment_id',
            'type' => 'Zend\Form\Element\Hidden'
        ]);
        $this->add([
            'name' => 'appointments_users_id',
            'type' => 'Zend\Form\Element\Hidden'
        ]);
        $this->add([
            'name' => 'appointment_datetime',
            'type' => 'Zend\Form\Element\Hidden'
        ]);
        $this->add([
            'name' => 'appointment_status',
            'type' => 'Zend\Form\Element\Hidden'
        ]);

        $this->add([
            'name' => 'appnt_provider_service_id',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => [
                'id' => 'appnt_provider_service_id',
                'onchange'=>'searchAppntProviderService(this)'
            ],
            'options' => [
                'label' => 'Start typing the name of the service',
                ]
            ]);


        $this->add([
            'name' => 'appnt_provider_id',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => [
                'id' => 'appnt_provider_id',
                'onchange'=>'searchAppntProvider(this)'
            ],
            'options' => [
               'label' => 'Start typing the name of the provider',
               
            ]
        ]);

        $this->add([
            'name' => 'facility_code',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => [
                'id' => 'facility_code',
                'onchange'=>'searchAppntHealthFacility(this)',
            ],
            'options' => [
                'label' => 'Start typing the name of the facility',
            ]
        ]);

        $this->add([
            'name' => 'comments',
            'type' => 'text',
            'attributes' => [
                'id' => 'comments',
            ],
            'options' => [
                'label' => 'Add comments'
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Button',
            'attributes' => [
                'value' => 'Submit',
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
