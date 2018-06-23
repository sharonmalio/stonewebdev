<?php

namespace Stonechat;

use Zend\Form\Form;


class UsersForm extends Form
{
    
    public function __construct($name = null)
    {
        parent::__construct('');
        
        $this->add([
            'name' => 'users_id',
            'type' => 'hidden'
        ]);
        
        $this->add([
            'name' => 'first_name',
            'type' => 'text',
            'options' => [
                'label' => 'First Name'
            ]
        ]);
        $this->add([
            'name' => 'last_name',
            'type' => 'text',
            'options' => [
                'label' => 'Last Name'
            ]
        ]);
       
        $this->add([
            'name' => 'email_address',
            'type' => 'text',
            'options' => [
                'label' => 'Email Address'
            ]
        ]);
       
        $this->add([
            'name' => 'account_password',
            'type' => 'password',
            'options' => [
              
                'label' => 'Password'
            ]
            
        ]);
        
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id' => 'submitbutton'
            ]
        ]);
    }
}
