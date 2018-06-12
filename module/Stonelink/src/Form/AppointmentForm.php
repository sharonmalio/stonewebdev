<?php
namespace Stonelink\Form;

use Zend\Form\Element;
use Zend\Form\Form;


class AppointmentForm extends Form
{

    public function __construct($name = null)
    {
        parent::__construct('');
    
        $this->add([
            'name' => 'appointment_id',
            'type' => 'hidden'
        ]);
        
        $this->add([
            'name' => 'first_name',
            'type' => 'text',
            'options' => [
                'label' => 'First Name'
            ]
        ]);
        $this->add([
            'name' => 'last_name',
            'type' => 'text',
            'options' => [
                'label' => 'Last Name'
            ]
        ]);
        $this->add([
            'name' => 'gender',
            'type' => 'text',
            'options' => [
                'label' => 'Gender'
            ]
        ]);
        $this->add([
            'name' => 'phone_number',
            'type' => 'number',
            'options' => [
                'label' => 'Phone Number'
            ]
        ]);
        $this->add([
            'name' => 'email_address',
            'type' => 'text',
            'options' => [
                'label' => 'Email Address'
            ]
        ]);
        $this->add([
            'name' => 'hospital_name',
            'type' => 'text',
            'options' => [
                'label' => 'Hospital Name'
            ]
        ]);
        $this->add([
            'name' => 'specialty',
            'type' => 'text',
            'options' => [
                'label' => 'Specialty of the doctor'
            ]
        ]);
        $this->add([
            'name' => 'appointment_date',
            'type' => 'date',
            'options' => [
                'label' => 'Date of appointment'
            ]
        ]);
        $this->add([
            'name' => 'appointment_time',
            'type' => 'time',
            'options' => [
                'format' => 'H:i',
                'label' => 'Time for Appointment'
            ]
            
        ]);
        
        $this->add([
            'name' => 'appointment_reason',
            'type' => 'text',
            'options' => [
                'label' => 'Reason for Appointment'
            ]
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id' => 'submitbutton'
            ]
        ]);
    }
}