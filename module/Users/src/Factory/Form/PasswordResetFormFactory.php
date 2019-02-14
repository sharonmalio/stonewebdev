<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    Moses Ndiritu
* @since     18-11-2018
*/

namespace Users\Factory\Form;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Users\Form\PasswordResetForm;

class PasswordResetFormFactory implements FactoryInterface
{

    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $fem = $container->get('FormElementManager');
        $form = new PasswordResetForm();
        $form->getFormFactory()->setFormElementManager($fem);
        $form->setServiceManager($container->get('ServiceManager'));
        return $form;
    }
}
