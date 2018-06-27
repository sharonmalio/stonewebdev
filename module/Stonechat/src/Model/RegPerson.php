<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    Sharon Malio
* @since     26-06-2018
*/

namespace Stonechat\Model;

use RuntimeException;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class RegPerson implements InputFilterAwareInterface
{

	public $reg_person_id;
	public $first_name;
	public $second_name;
	public $third_name;
	public $sex;
	public $date_of_birth;
	public $estimated_date_of_birth;
	public $national_id;
	public $nationality;
	public $admin_employee_id;
	public $user_id;
	public $date_registered;
	public $time_altered;
	public $living_status;
	protected $inputFilter;


	public function exchangeArray($data)
	{
		$this->reg_person_id=(isset($data['reg_person_id'])) ? $data['reg_person_id'] : null;
		$this->first_name=(isset($data['first_name'])) ? $data['first_name'] : null;
		$this->second_name=(isset($data['second_name'])) ? $data['second_name'] : null;
		$this->third_name=(isset($data['third_name'])) ? $data['third_name'] : null;
		$this->sex=(isset($data['sex'])) ? $data['sex'] : null;
		$this->date_of_birth=(isset($data['date_of_birth'])) ? $data['date_of_birth'] : null;
		$this->estimated_date_of_birth=(isset($data['estimated_date_of_birth'])) ? $data['estimated_date_of_birth'] : null;
		$this->national_id=(isset($data['national_id'])) ? $data['national_id'] : null;
		$this->nationality=(isset($data['nationality'])) ? $data['nationality'] : null;
		$this->admin_employee_id=(isset($data['admin_employee_id'])) ? $data['admin_employee_id'] : null;
		$this->user_id=(isset($data['user_id'])) ? $data['user_id'] : null;
		$this->date_registered=(isset($data['date_registered'])) ? $data['date_registered'] : null;
		$this->time_altered=(isset($data['time_altered'])) ? $data['time_altered'] : null;
		$this->living_status=(isset($data['living_status'])) ? $data['living_status'] : null;
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
				'name'     => 'reg_person_id',
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
				'name'     => 'second_name',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'third_name',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'sex',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'date_of_birth',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'estimated_date_of_birth',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'national_id',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'nationality',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'admin_employee_id',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'user_id',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'date_registered',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'time_altered',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'living_status',
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
