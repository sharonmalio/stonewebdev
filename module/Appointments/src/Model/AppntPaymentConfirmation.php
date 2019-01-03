<?php
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2019 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    smalio
 * @since     03-01-2019
 */
namespace Appointments\Model;

use RuntimeException;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Db\Adapter\Adapter;

class AppntPaymentConfirmation implements InputFilterAwareInterface
{

    public $appnt_payment_confirmation_id;

    public $merchant_request_id;

    public $checkout_request_id;

    public $result_code;

    public $result_desc;

    public $service_cost;

    public $mpesa_transaction_id;

    public $mpesa_transaction_date;

    public $appnt_user_phone_number;

    protected $inputFilter;

    protected $appntPaymentConfirmationTable;

    protected $tableName = 'appnt_payment_confirmation';

    public function exchangeArray($data)
    {
        $this->appnt_payment_confirmation_id = (isset($data['appnt_payment_confirmation_id'])) ? $data['appnt_payment_confirmation_id'] : null;
        $this->merchant_request_id = (isset($data['merchant_request_id'])) ? $data['merchant_request_id'] : null;
        $this->checkout_request_id = (isset($data['checkout_request_id'])) ? $data['checkout_request_id'] : null;
        $this->result_code = (isset($data['result_code'])) ? $data['result_code'] : null;
        $this->result_desc = (isset($data['result_desc'])) ? $data['result_desc'] : null;
        $this->service_cost = (isset($data['service_cost'])) ? $data['service_cost'] : null;
        $this->mpesa_transaction_id = (isset($data['mpesa_transaction_id'])) ? $data['mpesa_transaction_id'] : null;
        $this->mpesa_transaction_date = (isset($data['mpesa_transaction_date'])) ? $data['mpesa_transaction_date'] : null;
        $this->appnt_user_phone_number = (isset($data['appnt_user_phone_number'])) ? $data['appnt_user_phone_number'] : null;
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
                'name' => 'appnt_payment_confirmation_id',
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
                'name' => 'merchant_request_id',
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
                'name' => 'checkout_request_id',
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
                'name' => 'result_code',
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
                'name' => 'result_desc',
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
                'name' => 'service_cost',
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
                'name' => 'mpesa_transaction_id',
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
                'name' => 'mpesa_transaction_date',
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
                'name' => 'appnt_user_phone_number',
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

            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
}
