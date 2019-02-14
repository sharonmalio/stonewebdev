<?php
namespace Users\Form;

use Zend\Form\Form;
use Zend\ServiceManager\ServiceManager;

/**
 * This form is used to collect user's login and password.
 */
class LoginForm extends Form
{

    /**
     *
     * @var ServiceManager
     */
    protected $serviceManager;

    /**
     * Constructor.
     */
    public function __construct()
    {
        // Define form name
        parent::__construct('loginform');

        // Set POST method for this form
        $this->setAttribute('method', 'post');

        $this->addElements();
        $this->addInputFilter();
    }

    /**
     * This method adds elements to form (input fields and submit button).
     */
    protected function addElements()
    {
        // Add "identity_field" field
        $this->add([
            'type' => 'Zend\Form\Element\Text',
            'name' => 'identity_field',
            'options' => [
                'label' => 'E-mail or Username'
            ]
        ]);
        // Add "username" field
        $this->add([
            'type' => 'Zend\Form\Element\Text',
            'name' => 'username',
            'options' => [
                'label' => 'Username'
            ]
        ]);
        // Add "email" field
        $this->add([
            'type' => 'Zend\Form\Element\Text',
            'name' => 'email',
            'options' => [
                'label' => 'E-mail'
            ]
        ]);

        // Add "password" field
        $this->add([
            'type' => 'Zend\Form\Element\Password',
            'name' => 'password',
            'options' => [
                'label' => 'Password'
            ]
        ]);

        // Add "remember_me" field
        $this->add([
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'remember_me',
            'options' => [
                'label' => 'Remember me'
            ]
        ]);

        // Add "redirect_url" field
        $this->add([
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'redirect_url'
        ]);

        // Add the CSRF field
        $this->add([
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'csrf',
            'options' => [
                'csrf_options' => [
                    'timeout' => 600
                ]
            ]
        ]);

        // Add the Submit button
        $this->add([
            'type' => 'Zend\Form\Element\Button',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id' => 'submitbutton',
                'class' => 'myButton'
            ]
        ]);
    }

    /**
     * This method creates input filter (used for form filtering/validation).
     */
    private function addInputFilter()
    {
        // Create main input filter
        $inputFilter = $this->getInputFilter();

        // Add input for "email" field
        $inputFilter->add([
            'name' => 'email',
            'required' => true,
            'filters' => [
                [
                    'name' => 'StringTrim'
                ]
            ],
            'validators' => [
                [
                    'name' => 'EmailAddress',
                    'options' => [
                        'allow' => \Zend\Validator\Hostname::ALLOW_DNS,
                        'useMxCheck' => false
                    ]
                ]
            ]
        ]);

        // Add input for "email" field
        $inputFilter->add([
            'name' => 'username',
            'required' => true,
            'filters' => [
                [
                    'name' => 'StringTrim'
                ]
            ]
        ]);

        // Add input for "password" field
        $inputFilter->add([
            'name' => 'password',
            'required' => true,
            'filters' => [],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 6,
                        'max' => 64
                    ]
                ]
            ]
        ]);
        // Add input for "remember_me" field
        $inputFilter->add([
            'name' => 'remember_me',
            'required' => false,
            'filters' => [],
            'validators' => [
                [
                    'name' => 'InArray',
                    'options' => [
                        'haystack' => [
                            0,
                            1
                        ]
                    ]
                ]
            ]
        ]);

        // Add input for "redirect_url" field
        $inputFilter->add([
            'name' => 'redirect_url',
            'required' => false,
            'filters' => [
                [
                    'name' => 'StringTrim'
                ]
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 0,
                        'max' => 2048
                    ]
                ]
            ]
        ]);
    }

    /**
     *
     * @param ServiceManager $sm
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

