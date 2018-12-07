<?php
namespace Appointments\Form;
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    smalio
 * @since     16-11-2018
 */

use Zend\Form\Form;
use Zend\ServiceManager\ServiceManager;

class AppointmentsPhoneForm extends Form
{
    protected $serviceManager;
    
    public function init()
    {
        $this->setName('appointmentsphoneform');
        $this->setAttribute('id', 'appointmentsphoneform');
        $this->setAttribute('method', 'post');
        
        
        $this->add([
            'name' => 'phonenumber',
            'type' => 'text',
            'options' => [
                'label' => 'Phone number'
            ]
        ]);
      
  
      
      $this->add([
          'name' => 'submit',
          'type' => 'Zend\Form\Element\Button',
          'attributes' => [
              'value' => 'Submit',
              'id' => 'submitbutton'
          ]
      ]);
        
    }
    
    /**
     *
     * @param ServiceManager $serviceManager
     * @return \Appointments\Form\AppointmentsUsersForm
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
