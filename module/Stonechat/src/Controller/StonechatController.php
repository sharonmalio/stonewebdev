<?php
namespace Stonechat\Controller;

use Stonechat\Model\Users;
use Stonechat\Controller\StonechatController;
// use Stonechat\
use Stonechat\Model\UsersTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class StonechatController extends AbstractActionController
{
    // Add this property:
    
    private $usersTable;
    
    
    // Add this constructor: //I added the parameter so as to incorporate the other table
    public function __construct(UsersTable $usersTable)
    {
   
        $this->usersTable = $usersTable;
    }
    
    
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function signupAction()
    {
        // instantiate AppointmentForm and set the label on the submit button to "Add"
        $form = new UsersForm();
        $form->get('submit')->setValue('Add');
        // If the request is not a POST request, then no form data has been
        // submitted, and we need to display the form
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $user = new Users();
            $form->setData($request->getPost());
            $form->setInputFilter($user->getInputFilter());
            
            if ($form->isValid()) {
                
                $user->exchangeArray($form->getData());
                // Inserting appointment data in the datbase table
                $this->usersTable->saveUsers($user);
            } else {
                
                return array(
                    'form' => $form
                );
            }
        }
        
        return array(
            'form' => $form
        );
        // if it is invalid return form
        // we redirect back to the list of appointments using the Redirect
    }
    
    public function loginAction()
    {}

}