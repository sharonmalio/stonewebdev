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
namespace Appointments\Factory\Controller;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Appointments\Controller\AppointmentsController;

class AppointmentsControllerFactory implements FactoryInterface
{

    /**
     *
     * {@inheritdoc}
     * @see \Zend\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $serviceManager = $container->get('ServiceManager');
        $controller = new AppointmentsController();
        $controller->setServiceManager($serviceManager);
        $config = $container->get('Config');
        $safConfig = $config['safaricom'];
        $this->setSafCredentials($controller, $safConfig);
        return $controller;
    }

    public function setSafCredentials($controller, $safConfig)
    {
        $controller->setSafCallBackUrl($safConfig['callbackurl']);
        $controller->setSafConsumerSecret($safConfig['consumersecret']);
        $controller->setSafPassKey($safConfig['passkey']);
        $controller->setSafConsumerKey($safConfig['consumerkey']);
        $controller->setSafShortCode($safConfig['shortcode']);
    }
}
