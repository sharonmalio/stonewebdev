<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    Sharon Malio
* @since     11-07-2018
*/

namespace Application\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\ServiceManager\ServiceManager;

class User extends AbstractPlugin
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
	public function getUserRegisterForm()
	{
	    $form = $this->getServiceManager()->get('zfcuser_register_form');
	    // $form = $this->getFormElementManager()->get('zfcuser_register_form');
	    return $form;
	}
}
