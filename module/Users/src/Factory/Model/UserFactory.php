<?php
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    Moses Ndiritu
 * @since     05-11-2018
 */
namespace Users\Factory\Model;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Users\Model\User;

class UserFactory implements FactoryInterface
{

    /**
     * Invoke
     *
     * @param ContainerInterface $container,
     *            $requestedName, *@params array $options = null
     * @return mixed
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $dbAdapter = $container->get('ServiceManager')->get('Zend\Db\Adapter\Adapter');
        $model = new User($dbAdapter);
        return $model;
    }
}
