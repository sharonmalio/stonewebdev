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

class AppointmentsCalendarForm extends Form
{

    /**
     *
     * @var ServiceManager
     */
    protected $serviceManager;

    public function init()
    {
        $this->setName('appointmentscalendarform');
        $this->setAttribute('id', 'appointmentscalendarform');
        $this->setAttribute('method', 'post');

        $this->add([
            'name' => 'appointment_id',
            'type' => 'Zend\Form\Element\Hidden'
        ]);

        $this->add([
            'name' => 'appointment_date',
            'type' => 'Zend\Form\Element\Date',
            'options' => [
                'label' => 'Appointment Date'
                // 'format' => 'Y-m-d\TH:iP'
            ]
            // 'attributes' => [
            // 'min' => '2010-01-01',
            // 'max' => '2020-01-01',
            // 'step' => '1', // minutes; default step interval is 1 min
            // ]
        ]);

        $this->add([
            'name' => 'appointment_time',
            'type' => 'Zend\Form\Element\Time',
            'options' => [
                'label' => 'Appointment Time',
                'format' => 'H:i',
            ],
            'attributes' => [
                'min' => '00:00',
                'max' => '23:59',
                'step' => '60', // seconds; default step interval is 60 seconds
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Button',
            'attributes' => [
                'value' => 'Next',
                'id' => 'nextbutton',
                'float' => 'left'
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