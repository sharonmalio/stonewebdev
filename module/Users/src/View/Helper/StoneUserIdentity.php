<?php
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    Moses Ndiritu
 * @since     16-11-2018
 */
namespace Users\View\Helper;

use Zend\View\Helper\AbstractHelper;

class StoneUserIdentity extends AbstractHelper
{

    protected $serviceManager;

    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    public function setServiceManager($serviceManager)
    {
        return $this->serviceManager = $serviceManager;
    }

    public function __invoke()
    {
        $auth = $this->getServiceManager()->get('users_service_authenticationservice');
        if ($auth->hasIdentity()) {
            return $auth->getIdentity();
        } else {
            return false;
        }
    }
}
