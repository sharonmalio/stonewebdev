<?php
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    Moses Ndiritu
 * @since     01-11-2018
 */
namespace Users\Form;

use Zend\Form\Form;
use Zend\ServiceManager\ServiceManager;

class UserForm extends Form
{

    /**
     *
     * @var ServiceManager
     */
    protected $serviceManager;

    protected $usersService;

    public function init()
    {
        $this->setName('userform');
        $this->setAttribute('id', 'userform');
        $this->setAttribute('method', 'post');

        if (! $this->usersService) {
            $this->usersService = $this->getServiceManager()->get('users_service_users');
        }

        // Form Elements
        $this->add(array(
            'name' => 'user_id',
            'type' => 'Zend\Form\Element\Hidden'
        ));

        $this->add(array(
            'name' => 'first_name',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'data-dojo-type' => 'dijit/form/TextBox',
                'data-dojo-props' => "trim:true, propercase:true",
                'class' => 'dojoField'
            ),
            'options' => array(
                'label' => 'First name'
            )
        ));

        $this->add(array(
            'name' => 'second_name',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'data-dojo-type' => 'dijit/form/TextBox',
                'data-dojo-props' => "trim:true, propercase:true",
                'class' => 'dojoField'
            ),
            'options' => array(
                'label' => 'Second name'
            )
        ));

        $this->add(array(
            'name' => 'username',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'data-dojo-type' => 'dijit/form/TextBox',
                'data-dojo-props' => "trim:true",
                'class' => 'dojoField'
            ),
            'options' => array(
                'label' => 'Username'
            )
        ));

        $this->add(array(
            'name' => 'email',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'data-dojo-type' => 'dijit/form/TextBox',
                'data-dojo-props' => "trim:true",
                'class' => 'dojoField'
            ),
            'options' => array(
                'label' => 'Email'
            )
        ));

        $this->add(array(
            'name' => 'cell_phone',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'data-dojo-type' => 'dijit/form/TextBox',
                'data-dojo-props' => "trim:true",
                'class' => 'dojoField'
            ),
            'options' => array(
                'label' => 'Cell phone'
            )
        ));

        $this->add(array(
            'name' => 'display_name',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'data-dojo-type' => 'dijit/form/TextBox',
                'data-dojo-props' => "trim:true, propercase:true",
                'class' => 'dojoField'
            ),
            'options' => array(
                'label' => 'Display name'
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'role',
            'attributes' => array(
                'data-dojo-type' => "dijit/form/FilteringSelect",
                'class' => 'dojoField',
                'required' => true
            ),
            'options' => array(
                'label' => 'Role',
                'value_options' => array(
                    '' => '',
                    'Admin' => 'Admin',
                    'Clinician' => 'Clinician',
                    'FieldAssistant' => 'FieldAssistant',
                    'Finad' => 'Finad',
                    'LabAdmin' => 'LabAdmin',
                    'Lab' => 'Lab',
                    'Nurse' => 'Nurse',
                    'Registrar' => 'Registrar',
                    'Pharmacist' => 'Pharmacist',
                    'Programmer' => 'Programmer',
                    'Guest' => 'Guest'
                ),
                'label_attributes' => array()
            )
        ));

        $this->add(array(
            'name' => 'password',
            'type' => 'Zend\Form\Element\Password',
            'attributes' => array(
                'data-dojo-type' => 'dijit/form/TextBox',
                'data-dojo-props' => "trim:true",
                'class' => 'dojoField'
            ),
            'options' => array(
                'label' => 'Password'
            )
        ));

        $this->add(array(
            'name' => 'password_verify',
            'type' => 'Zend\Form\Element\Password',
            'attributes' => array(
                'data-dojo-type' => 'dijit/form/TextBox',
                'data-dojo-props' => "trim:true",
                'class' => 'dojoField'
            ),
            'options' => array(
                'label' => 'Password Verify'
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'state',
            'attributes' => array(
                'data-dojo-type' => "dijit/form/FilteringSelect",
                'class' => 'dojoField',
                'required' => true
            ),
            'options' => array(
                'label' => 'State',
                'value_options' => array(
                    '' => '',
                    1 => 'Active',
                    666 => 'Retired'
                ),
                'label_attributes' => array()
            )
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Button',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
                'class' => 'myButton',
                'data-dojo-type' => "dijit/form/Button",
                'data-dojo-props' => "type:'submit'"
            )
        ));
    }

    /**
     *
     * @param ServiceManager $serviceManager
     * @return \Users\Form\UserForm
     */
    public function setServiceManager(ServiceManager $sm)
    {
        $this->serviceManager = $sm;
    }

    /**
     *
     * @return \Zend\ServiceManager\ServiceManager
     */
    public function getServiceManager()
    {
        return $this->serviceManager;
    }
}
