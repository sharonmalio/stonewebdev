<?php 
/* @var $this \Zend\View\Renderer\PhpRenderer */
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license http://stonehmis.afyaresearch.org/license/options License Options
 * @author smalio
 * @since 16-11-2018
 */
namespace Appointments\Controller;

use Appointments\Model\AppointmentsUsers;
use Zend\Mvc\Controller\AbstractActionController;
use Exception;
use Appointments\Model\Appointments;

class AppointmentsController extends AbstractActionController
{

    protected $serviceManager;

    public function setServiceManager($serviceManager)
    {
        return $this->serviceManager = $serviceManager;
    }

    public function indexAction()
    {}

    public function addpersondetailsAction()
    {
        $formElementManager = $this->serviceManager->get('FormElementManager');
        $form = $formElementManager->get('Appointments\Form\AppointmentsUsersForm');
        $appointmentsTable = $this->serviceManager->get('Appointments\Model\AppointmentsUsersTable');
        // instantiate AppointmentForm and set the label on the submit button to "Add"
        // $form = new AppointmentsUsersForm();
        $form->get('submit')->setValue('Add');

        // If the request is not a POST request, then no form data has been
        // submitted, and we need to display the form
        $request = $this->getRequest();
       
        if ($request->isPost()) {
            $appointment = new AppointmentsUsers();
            $form->setData($request->getPost());
            $form->setInputFilter($appointment->getInputFilter());

            if ($form->isValid()) {
                $appointment->exchangeArray($form->getData());
                // Inserting appointment data in the database table
                $appnts_user_id = $appointmentsTable->saveAppointmentsUsers($appointment);
                
                return $this->redirect()->toRoute('appointments/appointments', [
                    'action' => 'selectserviceprovider',
                    'id'=>$appnts_user_id
                ]);
            } else {
                return [
                    'form' => $form
                ];
            }
        }
        $formElementManager = $this->serviceManager->get('FormElementManager');
        return [
            'form' => $formElementManager->get('Appointments\Form\AppointmentsUsersForm')
        ];
    }

    public function selectserviceproviderAction()
    {   
        $id=$this->params()->fromRoute('id');
        $formElementManager = $this->serviceManager->get('FormElementManager');
       
        $form = $formElementManager->get('Appointments\Form\AppointmentsServiceProviderForm');
        
        $appointmentsTable = $this->serviceManager->get('Appointments\Model\AppointmentsTable');
        $form->get('appointments_users_id')->setValue($id);
        $form->get('appointment_status')->setValue('0');
        
        $request = $this->getRequest();
        
        if ($request->isPost()){
            
           // var_dump($request->getPost());exit;
            $serviceprovider=new Appointments();
            $form->setData($request->getPost());
            $form->setInputFilter($serviceprovider->getInputFilter());
            if ($form->isValid()) {
                $serviceprovider->exchangeArray($form->getData());
                // Inserting appointment data in the database table
                $appnt_id = $appointmentsTable->saveAppointments($serviceprovider);
                
                return $this->redirect()->toRoute('appointments/appointments', [
                    'action' => 'configurecalendar',
                    'id'=>$appnt_id
                ]);
            } else {
                return [
                    'form' => $form
                ];
            }
        }
        // $this->ControllerNav()->initializeNav();
        return [
            'form' =>$form,
        ];
    }

    public function configurecalendarAction()
    {
        $id=$this->params()->fromRoute('id');

        $formElementManager = $this->serviceManager->get('FormElementManager');
        $form = $formElementManager->get('Appointments\Form\AppointmentsCalendarForm');
        $appointmentsTable = $this->serviceManager->get('Appointments\Model\AppointmentsTable');
        
        $form->get('appointment_id')->setValue($id);
        $request = $this->getRequest();
        $appointmentdetails = $appointmentsTable->fetchRowset('appointment_id', $id);
        if ($request->isPost()){
//             var_dump($request->getPost('appointment_date'));exit;
            $calendar=new Appointments();
            $form->setData($request->getPost());
            $form->setInputFilter($calendar->getInputFilter());
            
            if ($form->isValid()) {
                
                $appointmentdetails->appointment_date= $request->getPost('appointment_date');
                $appointmentdetails->appointment_time= $request->getPost('appointment_time');
                // Inserting appointment data in the database table
                $appointmentsTable->saveAppointments($appointmentdetails);
                
                return $this->redirect()->toRoute('appointments/appointments', [
                    'action' => 'confirmsummery',
                    
                ]);
            } else {
                return [
                    'form' => $form
                ];
            }
        }
        return [
            'form' =>$form,
        ];

    }

    public function confirmsummeryAction()
    {
    
        
    }

    public function callback()
    {
        try {
            // Set the response content type to application/json
            header("Content-Type:application/json");
            $resp = '{"ResultCode":0,"ResultDesc":"Confirmation recieved successfully"}';
            // read incoming request
            $postData = file_get_contents('php://input');
            // log file
            $filePath = "\opt\appLogs\messages.log";
            // error log
            $errorLog = "\opt\appLogs\errors.log";
            // Parse payload to json
            $jdata = json_decode($postData, true);
            // perform business operations on $jdata here
            // open text file for logging messages by appending
            $file = fopen($filePath, "a");
            // log incoming request
            fwrite($file, $postData);
            fwrite($file, "\r\n");
            // log response and close file
            fwrite($file, $resp);
            fclose($file);
        } catch (Exception $ex) {
            // append exception to errorLog
            $logErr = fopen($errorLog, "a");
            fwrite($logErr, $ex->getMessage());
            fwrite($logErr, "\r\n");
            fclose($logErr);
        }
        // echo response
        echo $resp;
    }

    public function payAction()
    {
        $formElementManager = $this->serviceManager->get('FormElementManager');
        $form = $formElementManager->get('Appointments\Form\AppointmentsPhoneForm');

        $request = $this->getRequest();
        
    
        if ($request->isPost()) {
           
            header("Content-Type:application/json");
            $phone = $request->getPost('phone_number');
            $shortcode = '174379';
            $passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
            $consumerkey = "mxHfXZgmIrq6aGkm0D4UOUV3ECp4g1OI";
            $consumersecret = "4KmjMiOe0sIIcnZS";
            //$validationurl = "enteryourvalidationurlhere";
            //$confirmationurl = "enteryourconfirmationurlhere";
            
            /* testing environment, comment the below two lines if on production */
            $authenticationurl = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
            $registerurl = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
            
            /* production un-comment the below two lines if you are in production */
            // $authenticationurl=’https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials’;
            // $registerurl = ‘https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl’;
            // $credentials = base64_encode($consumerkey . ':' . $consumersecret);
            
            // Request headers
            $headers = array(
                'Content-Type: application/json; charset=utf-8'
            );
            // Request
            $ch = curl_init($authenticationurl);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            // curl_setopt($ch, CURLOPT_HEADER, TRUE); // Includes the header in the output
            curl_setopt($ch, CURLOPT_HEADER, FALSE); // excludes the header in the output
            curl_setopt($ch, CURLOPT_USERPWD, $consumerkey . ":" . $consumersecret); // HTTP Basic Authentication
            $result = curl_exec($ch);
            // echo $result;
            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $result = json_decode($result);
            
            $access_token = $result->access_token;
            var_dump($access_token);
            exit;
            curl_close($ch);
            
            $date = time();
            $timestamp = date("Ymdhms", $date);
            
            $password = base64_encode($shortcode . $passkey . $timestamp);
            
            // echo $password;
            $transactiondesc = "Successful";
            $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
            $curlInitResult = curl_init($url);
            curl_setopt($curlInitResult, CURLOPT_URL, $url);
            curl_setopt($curlInitResult, CURLOPT_HTTPHEADER, array(
                'Content-Type:application/json',
                'Authorization:Bearer ' . $access_token
            )); // setting custom header
            
            $curl_post_data = array(
                // Fill in the request parameters with valid values
                'BusinessShortCode' => $shortcode,
                'Password' => $password,
                'Timestamp' => $timestamp,
                'TransactionType' => 'CustomerPayBillOnline',
                'Amount' => '5',
                'PartyA' => $phone,
                'PartyB' => $shortcode,
                'PhoneNumber' => $phone,
                'CallBackURL' => 'https://710529a7.ngrok.io/appointments/appointments/callback',
                'AccountReference' => 'Sharon',
                'TransactionDesc' => $transactiondesc
            );
            // $CallbackURL = 'https://webhook.site/adca9f7a-5471-4464-b493-4d05251ec658';
            $data_string = json_encode($curl_post_data);
            curl_setopt($curlInitResult, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curlInitResult, CURLOPT_POST, true);
            curl_setopt($curlInitResult, CURLOPT_POSTFIELDS, $data_string);
            
            $curl_response = curl_exec($curlInitResult);
            print_r($curl_response);
            $file = 'http://easyappointments.localhost/messages.log';
            fopen($file, "r");
            $safResp = file_get_contents($file);
            $decoded = json_decode($safResp, true);
            
            $flatArray = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($decoded));
            $list = iterator_to_array($flatArray, false);
            var_dump($list);
        } else {

            return [
                'form' => $form
            ];
        }

        $formElementManager = $this->serviceManager->get('FormElementManager');
        return [
            'form' => $formElementManager->get('Appointments\Form\AppointmentsPhoneForm')
        ];
    }

    public function addAction()
    {}

    public function deleteAction()
    {
        // return $this-> appointments -> $appointmentsService->AppointmentsUsersTable()->fetchAll();
    }

    public function editAction()
    {
        // return $this-> appointments -> $appointmentsService->AppointmentsUsersTable()->fetchAll();
    }
}
