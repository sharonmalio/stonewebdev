<?php 

namespace Stonelink\Form;

use Zend\Zend\Form;

class BookAppointmentForm extends Form{
    
    parent::__construct('stonelink');
    
    $this->add([
        'name' => 'id',
        'type' => 'hidden',
    ]);
    $this->add([
        'firstname' => 'name',
        'type' => 'text',
        'options' => [
            'label' => 'First Name',
        ],
    ]);
    $this->add([
        'lastname' => 'name',
        'type' => 'text',
        'options' => [
            'label' => 'Second Name',
        ],
    ]);
    $this->add([
        'gender' => 'gender',
        'type' => 'text',
        'options' => [
            'label' => 'Gender',
        ],
    ]);
    $this->add([
        'phonenumber' => 'number',
        'type' => 'number',
        'options' => [
            'label' => 'Phone Number',
        ],
    ]);
    $this->add([
        'emailaddress' => 'email',
        'type' => 'text',
        'options' => [
            'label' => 'Email',
        ],
    ]);
    $this->add([
        'hospitalname' => 'title',
        'type' => 'text',
        'options' => [
            'label' => 'Hospital Name',
        ],
    ]);
    $this->add([
        'date' => 'date',
        'type' => 'date',
        'options' => [
            'label' => 'Date',
        ],
    ]);
    $this->add([
        'specialty' => 'title',
        'type' => 'text',
        'options' => [
            'label' => 'Specialty',
        ],
    ]);
    $this->add([
        'time' => 'time',
        'type' => 'time',
        'options' => [
            'label' => 'Time of Appointment',
        ],
    ]);
    $this->add([
        'reason' => 'reason',
        'type' => 'text',
        'options' => [
            'label' => 'Reason for Appointment',
        ],
    ]);
    $this->add([
        'name' => 'submit',
        'type' => 'submit',
        'attributes' => [
            'value' => 'Go',
            'id'    => 'submitbutton',
        ],
    ]);
}
}