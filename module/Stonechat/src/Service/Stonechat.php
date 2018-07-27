<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    Sharon Malio
* @since     26-07-2018
*/

namespace Stonechat\Service;

use Zend\ServiceManager\ServiceManager;

class Stonechat
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

}
