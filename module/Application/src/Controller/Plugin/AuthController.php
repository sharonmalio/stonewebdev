<?php 
use Zend\Mvc\Controller\AbstractActionController;
use ZfcUser\Factory\Form\Login;
class AuthController extends AbstractActionController
{
 
    public function addAction()
    {
        
        
        // instantiate AppointmentForm and set the label on the submit button to "Add"
        $form = new Login();
        $form->get('submit')->setValue('Add');
        // If the request is not a POST request, then no form data has been
        // submitted, and we need to display the form
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $appointment = new Login();
            $form->setData($request->getPost());
            $form->setInputFilter($appointment->getInputFilter());
            
            if ($form->isValid()) {
                
                $appointment->exchangeArray($form->getData());
                // Inserting appointment data in the datbase table
                $this->appointmentTable->saveAppointment($appointment);
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
 
}
?>