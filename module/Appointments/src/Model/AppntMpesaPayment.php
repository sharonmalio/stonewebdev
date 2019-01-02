<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    smalio
* @since     18-12-2018
*/

namespace Appointments\Model;

use RuntimeException;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Db\Adapter\Adapter;

class AppntMpesaPayment implements InputFilterAwareInterface
{

	public $appnt_mpesa_payment_id;

	public $MerchantRequestID;

	public $CheckoutRequestID;

	public $ResultCode;

	public $ResultDesc;

	public $Amount;

	public $MpesaReceiptNumber;

	public $Balance;

	public $TransactionDate;

	public $PhoneNumber;

	public $MpesaStatus;

    protected $inputFilter;

    protected $dbAdapter;

    protected $appntMpesaPaymentTable;

    protected $tableName = 'appnt_mpesa_payment';


    public function __construct(Adapter $adapter)
    {
        $this->dbAdapter = $adapter;
    }


	public function exchangeArray($data)
	{
		$this->appnt_mpesa_payment_id=(isset($data['appnt_mpesa_payment_id'])) ? $data['appnt_mpesa_payment_id'] : null;
		$this->MerchantRequestID=(isset($data['MerchantRequestID'])) ? $data['MerchantRequestID'] : null;
		$this->CheckoutRequestID=(isset($data['CheckoutRequestID'])) ? $data['CheckoutRequestID'] : null;
		$this->ResultCode=(isset($data['ResultCode'])) ? $data['ResultCode'] : null;
		$this->ResultDesc=(isset($data['ResultDesc'])) ? $data['ResultDesc'] : null;
		$this->Amount=(isset($data['Amount'])) ? $data['Amount'] : null;
		$this->MpesaReceiptNumber=(isset($data['MpesaReceiptNumber'])) ? $data['MpesaReceiptNumber'] : null;
		$this->Balance=(isset($data['Balance'])) ? $data['Balance'] : null;
		$this->TransactionDate=(isset($data['TransactionDate'])) ? $data['TransactionDate'] : null;
		$this->PhoneNumber=(isset($data['PhoneNumber'])) ? $data['PhoneNumber'] : null;
		$this->MpesaStatus=(isset($data['MpesaStatus'])) ? $data['MpesaStatus'] : null;
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
				'name'     => 'appnt_mpesa_payment_id',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'MerchantRequestID',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'CheckoutRequestID',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'ResultCode',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'ResultDesc',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'Amount',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'MpesaReceiptNumber',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'Balance',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'TransactionDate',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'PhoneNumber',
				'required' => false,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			));

			$inputFilter->add(array(
				'name'     => 'MpesaStatus',
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
