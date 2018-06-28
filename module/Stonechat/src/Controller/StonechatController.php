<?php
namespace Stonechat\Controller;

use Stonechat\Form\RegPersonForm;
use Stonechat\Model\RegPerson;
use Stonechat\Model\RegPersonTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class StonechatController extends AbstractActionController
{
    // Add this property:
   
    private $regPersonTable;

    // Add this constructor: //I added the parameter so as to incorporate the other table
    public function __construct(RegPersonTable $regPersonTable)
    {
    
        $this->regPersonTable = $regPersonTable;
    }
    
   
    public function indexAction()
    {
        try{
            return new ViewModel([
         
            ]);
        } catch (\Exception $exception){
            die($exception);
        }
        
    }
    public function regpersonAction()
    {
        // instantiate AppointmentForm and set the label on the submit button to "Add"
        $form = new RegPersonForm();
        $form->get('submit')->setValue('Add');
        // If the request is not a POST request, then no form data has been
        // submitted, and we need to display the form
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $regperson = new RegPerson();
            $form->setData($request->getPost());
            $form->setInputFilter($regperson->getInputFilter());
            
            if ($form->isValid()) {
                $regperson->exchangeArray($form->getData());
                // Inserting appointment data in the datbase table
                $this->regPersonTable->saveRegPerson($regperson);
                echo("not posted");
                exit;
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

    public function editAction()
    {}

    public function deleteAction()
    {}
}