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
namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceManager;
use Zend\Authentication\Result;
use Zend\Uri\Uri;
use Users\Entity\User;

class AuthController extends AbstractActionController
{

    /**
     * Entity manager.
     *
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * Auth manager.
     *
     * @var \Users\Service\AuthManager
     */
    private $authManager;

    /**
     * User manager.
     *
     * @var \Users\Service\UserManager
     */
    private $userManager;

    /**
     * General module service
     *
     * @var \Users\Service\Users
     */
    protected $usersService;

    /**
     * Users Module Menu Service
     *
     * @var \Users\Service\UsersMenu
     */
    protected $usersMenuService;

    /**
     *
     * @var ServiceManager
     */
    protected $serviceManager;

    /**
     * Constructor.
     */
    public function __construct($entityManager, $authManager, $userManager)
    {
        $this->entityManager = $entityManager;
        $this->authManager = $authManager;
        $this->userManager = $userManager;
    }

    public function setUsersService($usersService)
    {
        return $this->usersService = $usersService;
    }

    public function setUsersMenuService($usersMenuService)
    {
        return $this->usersMenuService = $usersMenuService;
    }

    public function setServiceManager($serviceManager)
    {
        return $this->serviceManager = $serviceManager;
    }

    public function indexAction()
    {
        return new ViewModel();
    }

    public function loginAction()
    {
        // Retrieve the redirect URL (if passed). We will redirect the user to this
        // URL after successfull login.
        $redirectUrl = (string) $this->params()->fromQuery('redirectUrl', '');
        if (strlen($redirectUrl) > 2048) {
            throw new \Exception("Too long redirectUrl argument passed");
        }
        // Check if we do not have users in database at all. If so, create
        // the 'default' user.
        $this->userManager->createDefaultUserIfNotExists();
        // Create login form
        $form = $this->FormUsersForm()->getLoginForm();
        $form->get('submit')->setLabel('Sign In');
        $form->get('redirect_url')->setValue($redirectUrl);
        // Store login status.
        $isLoginError = false;
        // Check if user has submitted the form
        if ($this->getRequest()->isPost()) {
            // Fill in the form with POST data
            $data = $this->params()->fromPost();
            $form->setData($data);
            // Validate form
            if ($form->isValid()) {
                // Get filtered and validated data
                $data = $form->getData();
                if (! array_key_exists('remember_me', $data)) {
                    $data['remember_me'] = null;
                }
                // Perform login attempt.
                $result = $this->authManager->login($data['identity_field'], $data['password'], $data['remember_me']);

                // Check result.
                if ($result->getCode() == Result::SUCCESS) {
                    // Get redirect URL.
                    $redirectUrl = $this->params()->fromPost('redirect_url', '');
                    if (! empty($redirectUrl)) {
                        // The below check is to prevent possible redirect attack
                        // (if someone tries to redirect user to another domain).
                        $uri = new Uri($redirectUrl);
                        if (! $uri->isValid() || $uri->getHost() != null)
                            throw new \Exception('Incorrect redirect URL: ' . $redirectUrl);
                    }
                    // If redirect URL is provided, redirect the user to that URL;
                    // otherwise redirect to Home page.
                    if (empty($redirectUrl)) {
                        return $this->redirect()->toRoute('home');
                    } else {
                        $this->redirect()->toUrl($redirectUrl);
                    }
                } else {
                    $isLoginError = true;
                }
            }
        }
        return new ViewModel([
            'form' => $form,
            'isLoginError' => $isLoginError,
            'redirectUrl' => $redirectUrl
        ]);
    }

    /**
     * The "logout" action performs logout operation.
     */
    public function logoutAction()
    {
        $this->authManager->logout();
        return $this->redirect()->toRoute('login');
    }
}
