<?php
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    Moses Ndiritu
 * @since     05-11-2018
 */
namespace Users\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use RuntimeException;
use Zend\Db\Adapter\Adapter;
use Mendbase\Validator\PhoneValidator;

class User implements InputFilterAwareInterface
{

    public $user_id;

    public $first_name;

    public $second_name;

    public $username;

    public $email;

    public $cell_phone;

    public $display_name;

    public $role;

    public $password;

    public $state;

    public $date_registered;

    protected $inputFilter;

    protected $dbAdapter;

    protected $userTable;

    protected $tableName = 'user';

    public function __construct(Adapter $adapter)
    {
        $this->dbAdapter = $adapter;
    }

    public function exchangeArray($data)
    {
        $this->user_id = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->first_name = (isset($data['first_name'])) ? $data['first_name'] : null;
        $this->second_name = (isset($data['second_name'])) ? $data['second_name'] : null;
        $this->username = (isset($data['username'])) ? $data['username'] : null;
        $this->email = (isset($data['email'])) ? $data['email'] : null;
        $this->cell_phone = (isset($data['cell_phone'])) ? $data['cell_phone'] : null;
        $this->display_name = (isset($data['display_name'])) ? $data['display_name'] : null;
        $this->role = (isset($data['role'])) ? $data['role'] : null;
        $this->password = (isset($data['password'])) ? $data['password'] : null;
        $this->state = (isset($data['state'])) ? $data['state'] : null;
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
                'name' => 'user_id',
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
                'name' => 'first_name',
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
                'name' => 'second_name',
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
                'name' => 'username',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'Alnum'
                    ),
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    new \Zend\Validator\Db\NoRecordExists(array(
                        'table' => $this->tableName,
                        'field' => 'username',
                        'adapter' => $this->dbAdapter
                    ))
                )
            ));

            $inputFilter->add(array(
                'name' => 'email',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    new \Zend\Validator\Db\NoRecordExists(array(
                        'table' => $this->tableName,
                        'field' => 'email',
                        'adapter' => $this->dbAdapter
                    )),
                    new \Zend\Validator\EmailAddress(array(
                        'allow' => \Zend\Validator\Hostname::ALLOW_DNS
                    ))
                )
            ));

            $inputFilter->add(array(
                'name' => 'cell_phone',
                'required' => true,
                'filters' => array(

                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => PhoneValidator::class,
                        'options' => array(
                            'format' => PhoneValidator::PHONE_FORMAT_LOCAL
                        )
                    )
                )
            ));

            $inputFilter->add(array(
                'name' => 'display_name',
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
                'name' => 'role',
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
                'name' => 'password',
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
                'name' => 'password_verify',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'Identical',
                        'options' => array(
                            'token' => 'password',
                            'message' => 'Passwords do not match!'
                        )
                    )
                )
            ));

            $inputFilter->add(array(
                'name' => 'state',
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'Digits'
                    )
                )
            ));

            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
}
