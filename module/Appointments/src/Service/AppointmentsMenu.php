<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    smalio
* @since     13-12-2018
*/

namespace Appointments\Service;

use Zend\ServiceManager\ServiceManager;

class AppointmentsMenu
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

  public function getAppConfig()
  {

    return $this->getServiceManager()->get('Config');
  }

}
