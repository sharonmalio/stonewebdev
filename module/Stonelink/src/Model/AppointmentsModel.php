<?php
namespace Stonelink\Model;

use RuntimeException;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class AppointmentsModel implements InputFilterAwareInterface //the name of the model
{

    public $appointment_id;

    public $first_name;

    public $last_name;

    public $gender;

    public $phone_number;

    public $email;

    public $hospital_name;

    public $specialty;

    public $appointment_date;

    public $appointment_time;

    public $appointment_reason;

    private $inputFilter;

    public function exchangeArray($data)
    {
        $this->appointment_id = (isset($data['appointment_id'])) ? $data['appointment_id'] : null;
        $this->$first_name = (isset($data['$first_name'])) ? $data['$first_name'] : null;
        $this->last_name = (isset($data['last_name'])) ? $data['last_name'] : null;
        $this->gender = (isset($data['gender'])) ? $data['gender'] : null;
        $this->phone_number = (isset($data['phone_number'])) ? $data['phone_number'] : null;
        $this->email = (isset($data['email'])) ? $data['email'] : null;
        $this->hospital_name = (isset($data['hospital_name'])) ? $data['hospital_name'] : null;
        $this->specialty = (isset($data['specialty'])) ? $data['specialty'] : null;
        $this->appointment_date = (isset($data['appointment_date'])) ? $data['appointment_date'] : null;
        $this->appointment_time = (isset($data['appointment_time'])) ? $data['appointment_time'] : null;
        $this->appointment_reason = (isset($data['appointment_reason'])) ? $data['appointment_reason'] : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new RuntimeException('Not used');
    }

    public function getInputFilter()
    {
        if (! $this->inputFilter) {
            $inputFilter = new InputFilter();
            
            $inputFilter->add(array(
                'name' => 'appointment_id ',
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                )
            ));
            
            $inputFilter->add(array(
                'name' => ' first_name ',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                )
            ));
            
            $inputFilter->add(array(
                'name' => ' last_name ',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                )
            ));
            
            $inputFilter->add(array(
                'name' => ' gender ',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                )
            ));
            
            $inputFilter->add(array(
                'name' => ' phone_number ',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                )
            ));
            
            $inputFilter->add(array(
                'name' => ' email ',
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                )
            ));
            
            $inputFilter->add(array(
                'name' => ' hospital_name ',
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                )
            ));
            $inputFilter->add(array(
                'name' => ' specialty ',
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                )
            ));
            $inputFilter->add(array(
                'name' => ' appointment_date ',
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                )
            ));
            
            $inputFilter->add(array(
                'name' => ' appoinment_time ',
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                )
            ));
            $inputFilter->add(array(
                'name' => ' appointment_reason ',
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                )
            ));
        }
    }
}