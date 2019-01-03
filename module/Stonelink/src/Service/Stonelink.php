<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    Sharon Malio
* @since     27-07-2018
*/

namespace Stonelink\Service;

use Zend\ServiceManager\ServiceManager;

class Stonelink
{
    protected $kenyaMaps2015HealthFaicilities;
	protected $serviceManager;
	protected $provider;

	public function getServiceManager()
	{
		return $this->serviceManager;
	}

	public function setServiceManager(ServiceManager $serviceManager)
	{
		return $this->serviceManager = $serviceManager;
		return $this;
	}
	
	public function getKenyaMaps2015HealthFacilitiesTable()
	{
	    if (! $this->kenyaMaps2015HealthFaicilities) {
	        $sm = $this->getServiceManager();
	        $this->kenyaMaps2015HealthFaicilities = $sm->get('Stonelink\Model\KenyaMaps2015HealthFacilitiesTable');
	    }
	    return $this->kenyaMaps2015HealthFaicilities;
	}
	public function getProviderTable()
	{
	    if (! $this->provider) {
	        $sm = $this->getServiceManager();
	        $this->provider = $sm->get('Stonelink\Model\ProviderTable');
	    }
	    return $this->provider;
	}
	

}
