<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    smalio
* @since     10-12-2018
*/

namespace Appointments\Model;

use RuntimeException;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Db\Adapter\Adapter;

class Users implements InputFilterAwareInterface
{

	public $user_id;

	public $first_name;

	public $last_name;

	public $phone_number;

	public $email;

    protected $inputFilter;

    protected $dbAdapter;

    protected $usersTable;

    protected $tableName = 'users';


    public function __construct(Adapter $adapter)
    {
        $this->dbAdapter = $adapter;
    }


	public function exchangeArray($data)
	{
		$this->user_id=(isset($data['user_id'])) ? $data['user_id'] : null;
		$this->first_name=(isset($data['first_name'])) ? $data['first_name'] : null;
		$this->last_name=(isset($data['last_name'])) ? $data['last_name'] : null;
		$this->phone_number=(isset($data['phone_number'])) ? $data['phone_number'] : null;
		$this->email=(isset($data['email'])) ? $data['email'] : null;
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
				'name'     => 'user_id',
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

			$this->inputFilter = $inputFilter;
		}
		return $this->inputFilter;
	}
}
