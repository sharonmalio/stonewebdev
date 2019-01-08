<?php
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    Moses Ndiritu
 * @since     07-11-2018
 */
namespace Users\Factory\Controller;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Users\Controller\AuthController;
use Users\Service\AuthManager;
use Users\Service\UserManager;

class AuthControllerFactory implements FactoryInterface
{

    /**
     *
     * {@inheritdoc}
     * @see \Zend\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $authManager = $container->get(AuthManager::class);
        $userManager = $container->get(UserManager::class);
        $serviceManager = $container->get('ServiceManager');
        $controller = new AuthController($entityManager, $authManager, $userManager);
        $controller->setServiceManager($serviceManager);
        $usersService = $serviceManager->get('users_service_users');
        $controller->setUsersService($usersService);
        $usersMenuService = $serviceManager->get('users_service_usersmenu');
        $controller->setUsersMenuService($usersMenuService);
        return $controller;
    }
}
