<?php 
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    smalio
 * @since     16-11-2018
 */
namespace Appointments\Form;

use Zend\Form\Form;
use Zend\ServiceManager\ServiceManager;

class AppointmentsSummeryForm extends Form
{
    
    /**
     *
     * @var ServiceManager
     */
    protected $serviceManager;
    
    public function init()
    {
        $this->setName('appointmentssummeryform');
        $this->setAttribute('id', 'appointmentssummeryform');
        $this->setAttribute('method', 'post');

     
     $this->add([
         'name' => 'submit',
         'type' => 'Zend\Form\Element\Button',
         'attributes' => [
             'value' => 'Next',
             'id' => 'nextbutton',
             'float'=>'left'
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