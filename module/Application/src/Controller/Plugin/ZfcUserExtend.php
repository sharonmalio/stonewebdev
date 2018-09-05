<?php
namespace Application\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\ServiceManager\ServiceManager;

class ZfcUserExtend extends AbstractPlugin
{

    protected $serviceManager;

    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    public function setServiceManager(ServiceManager $serviceManager)
    {
        return $this->serviceManager = $serviceManager;
        return $this;
    }
    
    public function extendUserRegisterForm($e)
    {
       
        $form->add(array(
            'name' => 'first_name',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'First name',
                'label_attributes' => array()
            ),
            'attributes' => array(
                'required' => true
            )
        ), array(
            'priority' => 1000
        ));
        
        $form->add(array(
            'name' => 'second_name',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Second name',
                'label_attributes' => array()
            ),
            
            'attributes' => array(
                'required' => true
            )
        ), array(
            'priority' => 999
        ));
    }
}