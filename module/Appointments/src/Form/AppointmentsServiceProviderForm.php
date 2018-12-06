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

class AppointmentsServiceProviderForm extends Form
{
    protected $serviceManager;
    
    public function init()
    {
        $this->setName('appointmentsserviceproviderform');
        $this->setAttribute('id', 'appointmentsserviceproviderform');
        $this->setAttribute('method', 'post');
        
        $this->add([
            'name' => 'users_id',
            'type' => 'hidden',
            'options' => [
                'label' => 'Please select the service you need',
                'value_options' => [
                    '0' => 'Skin services ',
                    '1' => 'Cancer',
                    '2' => 'Gyn',
                    '3' => 'Head',
                ],
            ]
        ]);
        
      $this->add([
            'name' => 'users_id',
            'type' => 'hidden',
            'options' => [
                'label' => 'Please select your Provider',
                'value_options' => [
                    '0' => 'Sharon ',
                    '1' => 'Moses',
                    '2' => 'Mueni',
                    '3' => 'Micah',
                ],
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
