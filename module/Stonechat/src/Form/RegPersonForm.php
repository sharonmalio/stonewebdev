<?php
namespace Stonechat\Form;

use Zend\Form\Form;

class RegPersonForm extends Form
{
    public function __construct($name = null)
    {
        // $this->setName('regpersonform');
        // $this->setAttribute('id', 'form');
        // $this->setAttribute('method', 'post');
        parent::__construct('');
        
        $this->add([
            'name' => 'reg_person_id',
            'type' => 'hidden'
        ]);
        $this->add([
            'name' => 'first_name',
            'type' => 'text',
            'attributes' => [
                'data-dojo-type' => 'dijit/form/TextBox',
                'data-dojo-props' => "trim:true, propercase:true",
                'class' => 'dojoField'
            ],
            'options' => [
                'label' => 'First Name',
                'label_attributes' => []
            ]
        ]);
        $this->add([
            'name' => 'second_name',
            'type' => 'text',
            'attributes' => [
                'data-dojo-type' => 'dijit/form/TextBox',
                'data-dojo-props' => "trim:true, propercase:true",
                'class' => 'dojoField'
            ],
            'options' => [
                'label' => 'Second Name',
                'label_attributes' => []
            ]
        ]);
        $this->add([
            'name' => 'third_name',
            'type' => 'text',
            'attributes' => [
                'data-dojo-type' => 'dijit/form/TextBox',
                'data-dojo-props' => "trim:true, propercase:true",
                'class' => 'dojoField'
            ],
            'options' => [
                'label' => 'Third Name',
                'label_attributes' => []
            
            ]
        ]);
        $this->add([
            'name' => 'sex',
            'type' => 'text',
            'options' => [
                'label' => 'Gender',
                'value_options' => [
                    'female' => [
                        'label' => 'Female',
                        'label_attributes' => [
                            'class' => 'radio-inline'
                        ],
                        'value' => 'Female',
                        'attributes' => [
                            'id' => 'female_sex'
                        ]
                    ],
                    'male' => [
                        'label' => 'Male',
                        'label_attributes' => [
                            'class' => 'radio-inline'
                        ],
                        'value' => 'Male',
                        'attributes' => [
                            'id' => 'male_sex'
                        ]
                    ]
                ],
                'attributes' => [
                    'data-dojo-type' => 'dijit/form/RadioButton',
                    'id' => 'sex',
                    'class' => 'dojoField'
                ]
            ]
        ]);
        
        $this->add([
            'name' => 'date_of_birth',
            'type' => 'date',
            'attributes' => [
                'id' => 'date_of_birth',
                'data-dojo-type' => "dijit/form/DateTextBox",
                'data-dojo-props' => "constraints: { datePattern : 'dd-MM-yyyy', max: new Date() }",
                'required' => 'true',
                'class' => 'date_of_birth dojoField',
                'max' => date('Y-m-d'),
                'step' => 'any'
            ],
            'options' => [
                'label' => 'Date of birth',
                'label_attributes' => [
                    'class' => 'label_date_of_birth'
                ],
                'format' => 'Y-m-d'
            ]
        ]);
        
        $this->add([
            'name' => 'national_id',
            'type' => 'number',
            'attributes' => [
                'data-dojo-type' => "dijit/form/TextBox",
                'data-dojo-props' => "trim:true",
                'id' => 'national_id',
                'class' => 'national_id dojoField'
            ],
            'options' => [
                'label' => 'ID Number',
                'label_attributes' => [
                    'class' => 'label_national_id '
                ]
            ]
        ]);
        
        $this->add([
            'name' => 'nationality',
            'type' => 'text',
            'attributes' => [
                'id' => 'nationality',
                'data-dojo-type' => "dijit/form/FilteringSelect",
                // 'data-dojo-props' => "store:StoreFinadWorldcountries, pageSize:10,autcomplete:true,placeholder: 'Nationality'",
                'required' => 'true',
                'class' => 'dojoField'
            ],
            'options' => [
                'label' => 'Country of Origin',
                'label_attributes' => [],
                'disable_inarray_validator' => true
                // 'value_options' => $this->getSelectOptions()
            ]
        ]);
        
        $this->add([
            'name' => 'date_registered',
            'type' => 'date',
            'attributes' => [
                'id' => 'date_registered',
                'data-dojo-type' => "dijit/form/DateTextBox",
                'data-dojo-props' => "constraints: { datePattern : 'dd-MM-yyyy', max: new Date() }",
                'required' => 'true',
                'class' => 'date_registered dojoField',
                'max' => date('Y-m-d'),
                'step' => 'any'
            ],
            'options' => [
                'label' => 'Date Registered',
                'label_attributes' => [
                    'class' => 'label_date_of_birth'
                ],
                'format' => 'Y-m-d'
            ]
        ]);
        $this->add([
            'name' => 'estimated_date_of_birth',
            'type' => 'hidden'
        ]);
        
        $this->add([
            'name' => 'admin_employee_id',
            'type' => 'hidden'
        ]);
        
        $this->add([
            'name' => 'user_id',
            'type' => 'hidden'
        ]);
        
        $this->add([
            'name' => 'time_altered',
            'type' => 'hidden'
        ]);
        
        $this->add([
            'name' => 'living_status',
            'type' => 'hidden'
        ]);
        
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id' => 'submitbutton',
                'type' => 'submit',
                'class' => 'btn btn-primary btn-lg active'
            ]
        ]);
    }
}