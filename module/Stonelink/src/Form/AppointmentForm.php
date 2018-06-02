<?php
namespace Stonelink\Form;

use Zend\Form;

<<<<<<< HEAD
class AppointmentForm extends Form
=======
class BookAppointmentForm extends Form
>>>>>>> master
{

    public function __construct($name = null)
    {
<<<<<<< HEAD
        parent::__construct('');
        
        $this->add([
            'name' => 'appointment_id',
            'type' => 'hidden'
        ]);
        $this->add([
            'name' => 'first_name',
=======
        parent::__construct('appointment');//should be the name of the form
        //there are the form elements
        $this->add([
            'name' => 'id',
            'type' => 'hidden'
        ]);
        $this->add([
            'fname' => 'name',
>>>>>>> master
            'type' => 'text',
            'options' => [
                'label' => 'First Name'
            ]
        ]);
        $this->add([
<<<<<<< HEAD
            'name' => 'last_name',
=======
            'lname' => 'name',
>>>>>>> master
            'type' => 'text',
            'options' => [
                'label' => 'Second Name'
            ]
        ]);
        $this->add([
<<<<<<< HEAD
            'name' => 'gender',
=======
            'gender' => 'gender',
>>>>>>> master
            'type' => 'text',
            'options' => [
                'label' => 'Gender'
            ]
        ]);
        $this->add([
<<<<<<< HEAD
            'name' => 'phone_number',
=======
            'phone_number' => 'number',
>>>>>>> master
            'type' => 'number',
            'options' => [
                'label' => 'Phone Number'
            ]
        ]);
        $this->add([
<<<<<<< HEAD
            'name' => 'email_address',
            'type' => 'text',
            'options' => [
                'label' => 'Email Address'
            ]
        ]);
        $this->add([
            'name' => 'hospital_name',
=======
            'email' => 'email',
            'type' => 'text',
            'options' => [
                'label' => 'Email'
            ]
        ]);
        $this->add([
            'hospital' => 'title',
>>>>>>> master
            'type' => 'text',
            'options' => [
                'label' => 'Hospital Name'
            ]
        ]);
        $this->add([
<<<<<<< HEAD
            'name' => 'specialty',
            'type' => 'text',
            'options' => [
                'label' => 'Specialty of the doctor'
            ]
        ]);
        $this->add([
            'name' => 'date',
            'type' => 'date',
            'options' => [
                'label' => 'Date of appointment'
            ]
        ]);
        $this->add([
            'name' => 'appointment_time',
            'type' => 'time',
            'options' => [
                'label' => 'Appointment time'
            ]
        ]);
        
        $this->add([
            'name' => 'appointment_reason',
=======
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
>>>>>>> master
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
<<<<<<< HEAD
    }
=======
    }// end of the form elements
>>>>>>> master
}