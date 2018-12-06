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

class AppointmentsUsersForm extends Form
{

    /**
     *
     * @var ServiceManager
     */
    protected $serviceManager;

    public function init()
    {
        $this->setName('appointmentsusersform');
        $this->setAttribute('id', 'appointmentsusersform');
        $this->setAttribute('method', 'post');
        $this->add([
            'name' => 'users_id',
            'type' => 'hidden',
            'options' => [
                'label' => 'Users id'
            ]
        ]);

        $this->add([
            'name' => 'first_name',
            'type' => 'text',
            'options' => [
                'label' => 'First name'
            ]
        ]);

        $this->add([
            'name' => 'second_name',
            'type' => 'text',
            'options' => [
                'label' => 'Second name'
            ]
        ]);

        $this->add([
            'name' => 'phone_number',
            'type' => 'text',
            'options' => [
                'label' => 'Phone number'
            ]
        ]);

        $this->add([
            'name' => 'email',
            'type' => 'Zend\Form\Element\Text',
            'options' => [
                'label' => 'Email'
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
        
        $this->add([
            'name' => 'next',
            'type' => 'Zend\Form\Element\Button',
            'attributes' => [
                'value' => 'Next',
                'id' => 'nextbutton',
                'float'=>'left'
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
