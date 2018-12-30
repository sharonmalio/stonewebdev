<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    smalio
* @since     30-12-2018
*/

namespace Appointments\Model;

use RuntimeException;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Db\Adapter\Adapter;

class Appointments implements InputFilterAwareInterface
{

	public $appointment_id;

	public $appointments_users_id;

	public $appnt_provider_id;

	public $facility_code;

	public $appnt_provider_service_id;

	public $appointment_datetime;

	public $appointment_status;
	public $comments;

    protected $inputFilter;


    protected $appointmentsTable;

    protected $tableName = 'appointments';



	public function exchangeArray($data)
	{
		$this->appointment_id=(isset($data['appointment_id'])) ? $data['appointment_id'] : null;
		$this->appointments_users_id=(isset($data['appointments_users_id'])) ? $data['appointments_users_id'] : null;
		$this->appnt_provider_id=(isset($data['appnt_provider_id'])) ? $data['appnt_provider_id'] : null;
		$this->facility_code=(isset($data['facility_code'])) ? $data['facility_code'] : null;
		$this->appnt_provider_service_id=(isset($data['appnt_provider_service_id'])) ? $data['appnt_provider_service_id'] : null;
		$this->appointment_datetime=(isset($data['appointment_datetime'])) ? $data['appointment_datetime'] : null;
		$this->appointment_status=(isset($data['appointment_status'])) ? $data['appointment_status'] : null;
		$this->comments=(isset($data['comments'])) ? $data['comments'] : null;
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
				'name'     => 'appointments_users_id',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'appnt_provider_id',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'facility_code',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'appnt_provider_service_id',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'appointment_datetime',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'appointment_status',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));
			$inputFilter->add(array(
			    'name'     => 'comments',
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
