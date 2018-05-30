<?php
namespace Stonelink\Form;

use Zend\Form;

class BookAppointmentForm extends Form
{

    public function __construct($name = null)
    {
        parent::__construct('appointment');//should be the name of the form
        //there are the form elements
        $this->add([
            'name' => 'id',
            'type' => 'hidden'
        ]);
        $this->add([
            'fname' => 'name',
            'type' => 'text',
            'options' => [
                'label' => 'First Name'
            ]
        ]);
        $this->add([
            'lname' => 'name',
            'type' => 'text',
            'options' => [
                'label' => 'Second Name'
            ]
        ]);
        $this->add([
            'gender' => 'gender',
            'type' => 'text',
            'options' => [
                'label' => 'Gender'
            ]
        ]);
        $this->add([
            'phone_number' => 'number',
            'type' => 'number',
            'options' => [
                'label' => 'Phone Number'
            ]
        ]);
        $this->add([
            'email' => 'email',
            'type' => 'text',
            'options' => [
                'label' => 'Email'
            ]
        ]);
        $this->add([
            'hospital' => 'title',
            'type' => 'text',
            'options' => [
                'label' => 'Hospital Name'
            ]
        ]);
        $this->add([
            'specialty' => 'title',
            'type' => 'text',
            'options' => [
                'label' => 'Specialty'
            ]
        ]);
        $this->add([
            'appointment_date' => 'date',
            'type' => 'date',
            'options' => [
                'label' => 'Date'
            ]
        ]);
       
        $this->add([
            'appointment_time' => 'time',
            'type' => 'time',
            'options' => [
                'label' => 'Time of Appointment'
            ]
        ]);
        $this->add([
            'reason' => 'reason',
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
    }// end of the form elements
}