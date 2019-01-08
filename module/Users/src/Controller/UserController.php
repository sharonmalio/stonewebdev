<?php
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    Moses Ndiritu
 * @since     23-10-2018
 */
namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Crypt\Password\Bcrypt;
use Users\Service\Users;
use Users\Service\UsersMenu;
use Zend\ServiceManager\ServiceManager;
use Users\Entity\User;

class UserController extends AbstractActionController
{

    /**
     *
     * @var Users
     */
    protected $usersService;

    /**
     *
     * @var UsersMenu
     */
    protected $usersMenuService;

    /**
     *
     * @var ServiceManager
     */
    protected $serviceManager;

    /**
     * Entity manager.
     *
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * User manager.
     *
     * @var Users\Service\UserManager
     */
    private $userManager;

    /**
     * Constructor.
     */
    public function __construct($entityManager, $userManager)
    {
        $this->entityManager = $entityManager;
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
        $this->ControllerNav()->initializeNav();
        return new ViewModel();
    }

    public function addAction()
    {
        // Redirect to users register action
        return $this->redirect()->toRoute('users/user', array(
            'action' => 'register'
        ));
    }

    public function editAction()
    {
        // Check Editor has Admin Resources
        $this->CheckOwner()->isAdmin($this->MendUrl()
            ->getRefererUrl());
        $request = $this->getRequest();
        $id = (int) $this->params()->fromRoute('id', $this->RetrieveUser()
            ->getStoredId());
        if (! $id) {
            // Redirect to list of users
            return $this->redirect()->toRoute('users/user', array(
                'action' => 'list'
            ));
        }
        // does the user_id exist - ie is it set?
        $this->StoreUser()->isSetId($id, 'users/user', 'list');
        $form = $this->FormUsersForm()->getUserEditForm();

        $userId = new \Zend\Form\Element\Hidden('user_id');
        $userId->setValue($id);
        $form->add($userId);
        $form->get('submit')->setLabel('Edit User');
        // get user data and bind to form
        $user = $this->usersService->getUserTable()->getUser($id);
        $form->bind($user);
        // process form post
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid($request->getPost())) {
                $this->usersService->getUserTable()->saveUser($user);
                // Redirect to users list
                return $this->redirect()->toRoute('users/user', array(
                    'action' => 'list'
                ));
            }
        }
        $this->ControllerNav()->initializeNav();
        return array(
            'menuTitle' => 'User Menu',
            'pageName' => 'Users',
            'menu' => $this->usersMenuService->getUsersUserMenu(),
            'user' => $this->usersService->getUserName($id),
            'form' => $form
        );
    }

    public function registerAction()
    {
        // Check Editor has Admin Resources
        $this->CheckOwner()->isAdmin($this->MendUrl()
            ->getRefererUrl());
        $request = $this->getRequest();
        $form = $this->FormUsersForm()->getUserRegisterForm();
        $form->get('submit')->setLabel('Register User');
        // Process form Post
        if ($request->isPost()) {
            $user = $this->serviceManager->get('Users\Model\User');
            $bcrypt = new Bcrypt();
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $validatedPostData = $form->getData();
                $validatedPostData['password'] = $bcrypt->create($request->getPost()->password);
                unset($validatedPostData['password_verify']);
                $user->exchangeArray($validatedPostData);
                $this->usersService->getUserTable()->saveUser($user);
                // Redirect to client controller
                return $this->redirect()->toRoute('users/user', array(
                    'action' => 'list'
                ));
            }
        }
        $this->ControllerNav()->initializeNav();
        return array(
            'form' => $form,
            'menuTitle' => 'User Menu',
            'pageName' => 'Users',
            'menu' => $this->usersMenuService->getUsersUserMenu()
        );
    }

    public function listAction()
    {
        $this->ControllerNav()->initializeNav();
        return array(
            'menuTitle' => 'User Menu',
            'pageName' => 'Users',
            'menu' => $this->usersMenuService->getUsersUserMenu(),
            'grid' => 'grid/users/user/UsersUserEditGridx'
        );
    }

    public function changepasswordAction()
    {
        if ($this->StoneUserAuthentication()->hasIdentity()) {
            $id = $this->StoneUserAuthentication()->getId();
        } else {
            $id = (int) $this->params()->fromRoute('id', - 1);
        }
        if ($id < 1) {
            $this->getResponse()->setStatusCode(404);
            return;
        }
        $user = $this->entityManager->getRepository(User::class)->find($id);
        if ($user == null) {
            $this->getResponse()->setStatusCode(404);
            return;
        }
        $form = $this->FormUsersForm()->getPasswordChangeForm();
        $form->get('submit')->setLabel('Change Password');
        if ($this->getRequest()->isPost()) {
            $data = $this->params()->fromPost();
            $form->setData($data);
            if ($form->isValid()) {
                $data = $form->getData();
                if (! $this->userManager->changePassword($user, $data)) {
                    $this->flashMessenger()->addErrorMessage('Sorry, the old password is incorrect. Could not set the new password.');
                } else {
                    $this->flashMessenger()->addSuccessMessage('Changed the password successfully.');
                    return $this->redirect()->toRoute('users/user', array(
                        'action' => 'view',
                        'id' => $user->getId()
                    ));
                }
            }
        }
        $this->ControllerNav()->initializeNav();
        return array(
            'menuTitle' => 'User Menu',
            'pageName' => 'Users',
            'menu' => $this->usersMenuService->getUsersUserMenu(),
            'form' => $form
        );
    }

    public function changeemailAction()
    {
        $this->ControllerNav()->initializeNav();
        return array(
            'menuTitle' => 'User Menu',
            'pageName' => 'Users',
            'menu' => $this->usersMenuService->getUsersUserMenu()
            // 'user' => $applicationService->getUserName($id),
            // 'form' => $form
        );
    }

    public function retireAction()
    {
        // Check Editor has Admin Resources
        $this->CheckOwner()->isAdmin($this->MendUrl()
            ->getRefererUrl());
        $applicationService = $this->GetService()->getApplicationService();
        $id = (int) $this->params()->fromRoute('id', 0);
        if ($id) {
            // does the user_id exist - ie is it set?
            $this->StoreUser()->isSetId($id, 'users/user', 'retire');
            // set account dormant
            $applicationService->updateUser(array(
                'state' => 666
            ), $id);
            $this->flashMessenger()->addErrorMessage("User " . $applicationService->getUserName($id) . " Successfully Retired");
            $this->flashMessenger()->setNamespace('error');
            // Redirect to list of accounts
            return $this->redirect()->toRoute('users/user', array(
                'action' => 'retire'
            ));
        }
        $this->ControllerNav()->initializeNav();
        return array(
            'menuTitle' => 'User Menu',
            'pageName' => 'Users',
            'menu' => $this->usersMenuService->getUsersUserMenu(),
            'grid' => 'grid/users/user/UsersUserRetireGridx'
        );
    }

    public function reactivateAction()
    {
        // Check Editor has Admin Resources
        $this->CheckOwner()->isAdmin($this->MendUrl()
            ->getRefererUrl());
        $applicationService = $this->GetService()->getApplicationService();
        $id = (int) $this->params()->fromRoute('id', 0);
        if ($id) {
            // does the user_id exist - ie is it set?
            $this->StoreUser()->isSetId($id, 'users/user', 'retire');
            // set account dormant
            $applicationService->updateUser(array(
                'state' => 1
            ), $id);
            $this->flashMessenger()->addSuccessMessage("User " . $applicationService->getUserName($id) . " Successfully Reactivated");
            $this->flashMessenger()->setNamespace('success');
            // Redirect to list of users
            return $this->redirect()->toRoute('users/user', array(
                'action' => 'reactivate'
            ));
        }
        $this->ControllerNav()->initializeNav();
        return array(
            'menuTitle' => 'User Menu',
            'pageName' => 'User',
            'menu' => $this->usersMenuService->getUsersUserMenu(),
            'grid' => 'grid/users/user/UsersUserReactivateGridx'
        );
    }

    public function viewAction()
    {
        $id = (int) $this->params()->fromRoute('id', - 1);
        if ($id < 1) {
            $this->getResponse()->setStatusCode(404);
            return;
        }
        // Find a user with such ID.
        $user = $this->entityManager->getRepository(User::class)->find($id);
        if ($user == null) {
            $this->getResponse()->setStatusCode(404);
            return;
        }
        $this->ControllerNav()->initializeNav();
        return new ViewModel([
            'menuTitle' => 'User Menu',
            'user' => $user,
            'pageName' => 'User',
            'menu' => $this->usersMenuService->getUsersUserMenu()
        ]);
    }

    public function resetpasswordAction()
    {
        $form = $this->FormUsersForm()->getPasswordResetForm();
        $form->get('submit')->setLabel('Reset Password');
        // Check if user has submitted the form
        if ($this->getRequest()->isPost()) {
            // Fill in the form with POST data
            $data = $this->params()->fromPost();
            $form->setData($data);
            // Validate form
            if ($form->isValid()) {
                // Look for the user with such email.
                $user = $this->entityManager->getRepository(User::class)->findOneByEmail($data['email']);
                if ($user != null && $user->getState() == User::STATE_ACTIVE) {
                    // Generate a new password for user and send an E-mail
                    // notification about that.
                    $this->userManager->generatePasswordResetToken($user);
                    // Redirect to "message" page
                    return $this->redirect()->toRoute('resetpassword/message', [
                        'action' => 'message'
                    ], [
                        'query' => [
                            'id' => 'sent'
                        ]
                    ]);
                } else {
                    return $this->redirect()->toRoute('resetpassword/message', [
                        'action' => 'message'
                    ], [
                        'query' => [
                            'id' => 'invalid-email'
                        ]
                    ]);
                }
            }
        }
        $this->ControllerNav()->initializeNav();
        return new ViewModel([
            'menuTitle' => 'User Menu',
            'pageName' => 'User',
            'form' => $form,
            'menu' => $this->usersMenuService->getUsersUserMenu()
        ]);
    }

    public function messageAction()
    {
        // Get message ID from route.
        $id = (string) $this->params()->fromQuery('id');
        // Validate input argument.
        if ($id != 'invalid-email' && $id != 'sent' && $id != 'set' && $id != 'failed') {
            throw new \Exception('Invalid message ID specified');
        }
        $this->ControllerNav()->initializeNav();
        return new ViewModel([
            'id' => $id
        ]);
    }

    public function setpasswordAction()
    {
        $email = $this->params()->fromQuery('email', null);
        $token = $this->params()->fromQuery('token', null);
        // Validate token length
        if ($token != null && (! is_string($token) || strlen($token) != 32)) {
            throw new \Exception('Invalid token type or length');
        }
        if ($token === null || ! $this->userManager->validatePasswordResetToken($email, $token)) {
            return $this->redirect()->toRoute('resetpassword/message', [
                'action' => 'message'
            ], [
                'query' => [
                    'id' => 'failed'
                ]
            ]);
        }
        $form = $this->FormUsersForm()->getPasswordSetForm();
        $form->get('submit')->setLabel('Change Password');
        if ($this->getRequest()->isPost()) {
            // Fill in the form with POST data
            $data = $this->params()->fromPost();
            $form->setData($data);
            // Validate form
            if ($form->isValid()) {
                $data = $form->getData();
                // Set new password for the user.
                if ($this->userManager->setNewPasswordByToken($email, $token, $data['new_password'])) {
                    // Redirect to "message" page
                    return $this->redirect()->toRoute('resetpassword/message', [
                        'action' => 'message'
                    ], [
                        'query' => [
                            'id' => 'set'
                        ]
                    ]);
                } else {
                    // Redirect to "message" page
                    return $this->redirect()->toRoute('resetpassword/message', [
                        'action' => 'message'
                    ], [
                        'query' => [
                            'id' => 'failed'
                        ]
                    ]);
                }
            }
        }
        $this->ControllerNav()->initializeNav();
        return new ViewModel([
            'form' => $form
        ]);
    }
}
