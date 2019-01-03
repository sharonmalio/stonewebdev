<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    smalio
* @since     14-12-2018
*/

namespace Appointments\Factory\Controller;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Appointments\Controller\AppntproviderController;

class AppntproviderControllerFactory implements FactoryInterface
{

    /**
    *
    * {@inheritdoc}
    * @see \Zend\ServiceManager\Factory\FactoryInterface::__invoke()
    */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $serviceManager = $container->get('ServiceManager');
        $controller = new AppntproviderController();
        $controller->setServiceManager($serviceManager);
        $appointmentsService = $serviceManager->get('appointments_service_appointments');
        $controller->setAppointmentsService($appointmentsService);
        $appointmentsMenuService = $serviceManager->get('appointments_service_appointmentsmenu');
        $controller->setAppointmentsMenuService($appointmentsMenuService);
        return $controller;
    }

}
