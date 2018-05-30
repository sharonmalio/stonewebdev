<?php
namespace Stonelink\Model;

use RuntimeException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;

class Appointments implements InputFilterAwareInterface // the name of the model
{

    public $id;

    public $fname;

    public $lname;

    public $gender;

    public $phone_number;

    public $email;

    public $hospital;

    public $specialty;

    public $appointment_date;

    public $appointment_time;

    public $reason;

    private $inputFilter;

    public function exchangeArray($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->fname = (isset($data['fname'])) ? $data['fname'] : null;
        $this->lname = (isset($data['lname'])) ? $data['lname'] : null;
        $this->gender = (isset($data['gender'])) ? $data['gender'] : null;
        $this->phone_number = (isset($data['phone_number'])) ? $data['phone_number'] : null;
        $this->email = (isset($data['email'])) ? $data['email'] : null;
        $this->hospital = (isset($data['hospital'])) ? $data['hospital'] : null;
        $this->specialty = (isset($data['specialty'])) ? $data['specialty'] : null;
        $this->appointment_date = (isset($data['appointment_date'])) ? $data['appointment_date'] : null;
        $this->appointment_time = (isset($data['appointment_time'])) ? $data['appointment_time'] : null;
        $this->reason = (isset($data['reason'])) ? $data['reason'] : null;
    }

    public function setInputFilter(InputFilterInterface $inputFilter)//defined by the InputFilterAwareINterface
    {
        throw new RuntimeException('There is a problem');
    }

    public function getInputFilter()//defined by the InputFilterAwareINterface
    {
        if ($this->inputFilter) 
        {
            return $this->inputFilter;
        }
        
        $inputFilter = new InputFilter();
        
        $inputFilter->add(array(
            'name' => 'id ',
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
            'name' => ' fname ',
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
            'name' => ' lname ',
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
            'name' => ' hospital ',
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
            'name' => ' specialty ',
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
            'name' => 'appointment_date ',
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
            'name' => ' appointment_time ',
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
            'name' => ' reason ',
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
        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }
}