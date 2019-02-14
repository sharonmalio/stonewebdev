<?php
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    Moses Ndiritu
 * @since     08-11-2018
 */
namespace Users\Factory\Service;

use Interop\Container\ContainerInterface;
use Users\Service\AuthAdapter;
use Zend\ServiceManager\Factory\FactoryInterface;

class AuthAdapterFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // Get Doctrine entity manager from Service Manager.
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $service = new AuthAdapter($entityManager);
        return $service;
    }
}
