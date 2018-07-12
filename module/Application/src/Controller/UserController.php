<?php
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    Sharon Malio
 * @since     11-07-2018
 */
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function registerAction()
    {
//         $this->CheckOwner()->checkLogin();
//         $this->CheckOwner()->checkUserLevelClearance(array(
//             'Admin',
//             'Programmer'
//         ));
        //$this->logout();
        $this->ControllerNav()->initializeNav();
        return array(
            'registerForm' => $this->User()->getUserRegisterForm()
        );
    }
}
