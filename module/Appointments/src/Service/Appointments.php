<?php
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    smalio
 * @since     10-12-2018
 */
namespace Appointments\Service;

use Zend\ServiceManager\ServiceManager;

class Appointments
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

    public function getProviderTable()
    {
        return $this->serviceManager->get('Appointments\Model\ProviderTable');
    }

    public function fetchProviderNames()
    {

    }

    public function getAppntHealthFacilityTable()
    {
        return $this->serviceManager->get('Appointments\Model\AppntHealthFacilityTable');
    }
    
    public function getAppntProviderTable()
    {
        return $this->serviceManager->get('Appointments\Model\AppntProviderTable');
    }
    
    public function getAppntProviderServiceTable()
    {
        return $this->serviceManager->get('Appointments\Model\AppntProviderServiceTable');
    }
}
