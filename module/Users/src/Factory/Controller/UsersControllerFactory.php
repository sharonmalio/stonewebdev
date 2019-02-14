<?php
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    Moses Ndiritu
 * @since     31-10-2018
 */
namespace Users\Factory\Controller;

use Interop\Container\ContainerInterface;
use Users\Controller\UsersController;
use Zend\ServiceManager\Factory\FactoryInterface;

class UsersControllerFactory implements FactoryInterface
{

    /**
     *
     * {@inheritdoc}
     * @see \Zend\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $serviceManager = $container->get('ServiceManager');
        $controller = new UsersController();
        $controller->setServiceManager($serviceManager);
        $usersService = $serviceManager->get('users_service_users');
        $controller->setUsersService($usersService);
        $usersMenuService = $serviceManager->get('users_service_usersmenu');
        $controller->setUsersMenuService($usersMenuService);
        return $controller;
    }
}
