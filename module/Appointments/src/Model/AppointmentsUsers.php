<?php

namespace Appointments\Model;
use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;

class AppointmentsUsers implements InputFilterAwareInterface {

	public $appointments_users_id;
	public $first_name;
	public $second_name;
	public $phone_number;
	public $email;
	
	protected $inputFilter;


	public function exchangeArray($data)
	{
		$this->appointments_users_id=(isset($data['appointments_users_id'])) ? $data['appointments_users_id'] : null;
		$this->first_name=(isset($data['first_name'])) ? $data['first_name'] : null;
		$this->second_name=(isset($data['second_name'])) ? $data['second_name'] : null;
		$this->phone_number=(isset($data['phone_number'])) ? $data['phone_number'] : null;
		$this->email=(isset($data['email'])) ? $data['email'] : null;
	}
	
	public function getArrayCopy()
	{
		return get_object_vars($this);
	}
	/* Add the following methods: */
	
	public function setInputFilter(InputFilterInterface $inputFilter)
	{
	    throw new DomainException(sprintf(
	        '%s does not allow injection of an alternate input filter',
	        __CLASS__
	        ));
	}
	
	public function getInputFilter()
	{
	    if ($this->inputFilter) {
	        return $this->inputFilter;
	    }
	    
	    $inputFilter = new InputFilter();
	    
	    $inputFilter->add([
	        'name' => 'appointments_users_id',
	        'required' => false,
	        'filters' => [
	            ['name' => ToInt::class],
	        ],
	    ]);
	    
	    $inputFilter->add([
	        'name' => 'first_name',
	        'required' => false,
	        'filters' => [
	            ['name' => StripTags::class],
	            ['name' => StringTrim::class],
	        ],
	        'validators' => [
	            [
	                'name' => StringLength::class,
	                'options' => [
	                    'encoding' => 'UTF-8',
	                    'min' => 1,
	                    'max' => 100,
	                ],
	            ],
	        ],
	    ]);
	    
	    $inputFilter->add([
	        'name' => 'second_name',
	        'required' => false,
	        'filters' => [
	            ['name' => StripTags::class],
	            ['name' => StringTrim::class],
	        ],
	        'validators' => [
	            [
	                'name' => StringLength::class,
	                'options' => [
	                    'encoding' => 'UTF-8',
	                    'min' => 1,
	                    'max' => 100,
	                ],
	            ],
	        ],
	    ]);
	    
	    $inputFilter->add([
	        'name' => 'phone_number',
	        'required' => false,
	        'filters' => [
	            ['name' => StripTags::class],
	            ['name' => StringTrim::class],
	        ],
	        'validators' => [
	            [
	                'name' => StringLength::class,
	                'options' => [
	                    'encoding' => 'UTF-8',
	                    'min' => 1,
	                    'max' => 100,
	                ],
	            ],
	        ],
	    ]);
	    
	    $inputFilter->add([
	        'name' => 'email',
	        'required' => false,
	        'filters' => [
	            ['name' => StripTags::class],
	            ['name' => StringTrim::class],
	        ],
	        'validators' => [
	            [
	                'name' => StringLength::class,
	                'options' => [
	                    'encoding' => 'UTF-8',
	                    'min' => 1,
	                    'max' => 100,
	                ],
	            ],
	        ],
	    ]);
	    
	    $this->inputFilter = $inputFilter;
	    return $this->inputFilter;
	}
}
