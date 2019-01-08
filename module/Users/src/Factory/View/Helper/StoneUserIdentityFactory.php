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

namespace Users\Factory\View\Helper;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Users\View\Helper\StoneUserIdentity;

class StoneUserIdentityFactory implements FactoryInterface
{

    /**
     *
     * {@inheritdoc}
     * @see \Zend\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $ViewHelper = new StoneUserIdentity();
        $ViewHelper->setServiceManager($container->get('ServiceManager'));
        return $ViewHelper;
    }

}
