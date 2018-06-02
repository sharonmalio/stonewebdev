<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    Sharon Malio
* @since     01-06-2018
*/

namespace Stonelink\Model;

use RuntimeException;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Appointment implements InputFilterAwareInterface
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
	public $appoinment_reason;
	protected $inputFilter;


	public function exchangeArray($data)
	{
		$this->appointment_id=(isset($data['appointment_id'])) ? $data['appointment_id'] : null;
		$this->first_name=(isset($data['first_name'])) ? $data['first_name'] : null;
		$this->last_name=(isset($data['last_name'])) ? $data['last_name'] : null;
		$this->gender=(isset($data['gender'])) ? $data['gender'] : null;
		$this->phone_number=(isset($data['phone_number'])) ? $data['phone_number'] : null;
		$this->email=(isset($data['email'])) ? $data['email'] : null;
		$this->hospital_name=(isset($data['hospital_name'])) ? $data['hospital_name'] : null;
		$this->specialty=(isset($data['specialty'])) ? $data['specialty'] : null;
		$this->appointment_date=(isset($data['appointment_date'])) ? $data['appointment_date'] : null;
		$this->appointment_time=(isset($data['appointment_time'])) ? $data['appointment_time'] : null;
		$this->appoinment_reason=(isset($data['appoinment_reason'])) ? $data['appoinment_reason'] : null;
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
				'name'     => 'appointment_id',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'first_name',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'last_name',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'gender',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'phone_number',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'email',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'hospital_name',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'specialty',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'appointment_date',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'appointment_time',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'appoinment_reason',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$this->inputFilter = $inputFilter;
		}
		return $this->inputFilter;
	}
}
