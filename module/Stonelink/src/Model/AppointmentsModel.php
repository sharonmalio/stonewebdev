<?php 

namespace Stonelink\Model;

use RuntimeException;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class AppointmentsModel implements InputFilterAwareInterface
{
    
    public $id;
    public $firstname;
    public $secondname;
    public $gender;
    public $phonenumber;
    public $email;
    public $hospital;
    public $date;
    public $specialty;
    public $time;
    public $reason;
    protected $inputFilter;
    


public function exchangeArray($data)
{
    $this->id=(isset($data['id'])) ? $data['id'] : null;
    $this->firstname=(isset($data['firstname'])) ? $data['firstname'] : null;
    $this->secondname=(isset($data['secondname'])) ? $data['secondname'] : null;
    $this->gender=(isset($data['gender'])) ? $data['gender'] : null;
    $this->phonenumber=(isset($data['phonenumber'])) ? $data['phonenumber'] : null;
    $this->email=(isset($data['email'])) ? $data['email'] : null;
    $this->hospital=(isset($data['hospital'])) ? $data['hospital'] : null;
    $this->date=(isset($data['date'])) ? $data['date'] : null;
    $this->specialty=(isset($data['specialty'])) ? $data['specialty'] : null;
    $this->time=(isset($data['time'])) ? $data['time'] : null;
    $this->reason=(isset($data['reason'])) ? $data['reason'] : null;
    
}

public function getArrayCopy()
{
    return get_object_vars($this);
}


public function setInputFilter(InputFilterInterface $inputFilter)
{
    throw new RuntimeException(
        'Not used'
        );
}


public function getInputFilter()
{
    if (!$this->inputFilter) {
        $inputFilter = new InputFilter();
        
        $inputFilter->add(array(
            'name'     => 'id ',
            'required' => false,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
        ));
        
        $inputFilter->add(array(
            'name'     => ' firstname ',
            'required' => false,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
        ));
        
        $inputFilter->add(array(
            'name'     => ' secondname ',
            'required' => false,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
        ));
        
        $inputFilter->add(array(
            'name'     => ' gender ',
            'required' => false,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
        ));
        
        $inputFilter->add(array(
            'name'     => ' phonenumber ',
            'required' => false,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
        ));
        
        $inputFilter->add(array(
            'name'     => ' email ',
            'required' => false,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
        ));
        
        $inputFilter->add(array(
            'name'     => ' hospital ',
            'required' => false,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
        ));
        $inputFilter->add(array(
            'name'     => ' date ',
            'required' => false,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
        ));
        $inputFilter->add(array(
            'name'     => ' specialty ',
            'required' => false,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
        ));
        $inputFilter->add(array(
            'name'     => ' time ',
            'required' => false,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
        ));
        $inputFilter->add(array(
            'name'     => ' reason ',
            'required' => false,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
        ));
}