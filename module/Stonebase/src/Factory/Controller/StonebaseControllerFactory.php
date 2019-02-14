<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2019 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    smalio
* @since     24-01-2019
*/

namespace Stonebase\Factory\Controller;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Stonebase\Controller\StonebaseController;

class StonebaseControllerFactory implements FactoryInterface
{

    /**
    *
    * {@inheritdoc}
    * @see \Zend\ServiceManager\Factory\FactoryInterface::__invoke()
    */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $serviceManager = $container->get('ServiceManager');
        $controller = new StonebaseController();
        $controller->setServiceManager($serviceManager);
        $stonebaseService = $serviceManager->get('stonebase_service_stonebase');
        $controller->setStonebaseService($stonebaseService);
        $stonebaseMenuService = $serviceManager->get('stonebase_service_stonebasemenu');
        $controller->setStonebaseMenuService($stonebaseMenuService);
        return $controller;
    }

}
