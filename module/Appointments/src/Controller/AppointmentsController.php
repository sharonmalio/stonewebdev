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

use Appointments\Model\Appointments;
use AfricasTalking\SDK\AfricasTalking;
use Appointments\Model\AppointmentsUsers;
use Zend\Mvc\Controller\AbstractActionController;
use Exception;
use Appointments\Model\AppntPaymentConfirmation;
use Zend\Mail;
use Zend\Mvc\Console\View\ViewModel;

class AppointmentsController extends AbstractActionController
{

    protected $serviceManager;

    protected $saf_shortcode;

    protected $saf_passkey;

    protected $saf_consumerkey;

    protected $saf_consumersecret;

    protected $saf_callbackurl;

    public function setServiceManager($serviceManager)
    {
        return $this->serviceManager = $serviceManager;
    }

    public function setSafShortCode($saf_shortcode)
    {
        return $this->saf_shortcode = $saf_shortcode;
    }

    public function setSafPassKey($saf_passkey)
    {
        return $this->saf_passkey = $saf_passkey;
    }

    public function setSafConsumerKey($saf_consumerkey)
    {
        return $this->saf_consumerkey = $saf_consumerkey;
    }

    public function setSafConsumerSecret($saf_consumersecret)
    {
        return $this->saf_consumersecret = $saf_consumersecret;
    }

    public function setSafCallBackUrl($saf_callbackurl)
    {
        return $this->saf_callbackurl = $saf_callbackurl;
    }

    public function indexAction()
    {
        return [
            
        ];
    }

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
                    'id' => $appnts_user_id
                ], [
                    "query" => [
                        'email' => $request->getPost('email')
                    ],
                    "query" => [
                        'first_name' => $request->getPost('first_name')
                    ],
                    "query" => [
                        'phone_number' => $request->getPost('phone_number')
                    ]
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
        $id = $this->params()->fromRoute('id');
        $email = $this->params()->fromQuery('email');
        $phone_number = $this->params()->fromQuery('phone_number');
        $first_name = $this->params()->fromQuery('first_name');
        $formElementManager = $this->serviceManager->get('FormElementManager');

        $form = $formElementManager->get('Appointments\Form\AppointmentsServiceProviderForm');

        $appointmentsTable = $this->serviceManager->get('Appointments\Model\AppointmentsTable');
        $form->get('appointments_users_id')->setValue($id);
        $form->get('appointment_status')->setValue('0');

        $request = $this->getRequest();

        if ($request->isPost()) {

            // var_dump($request->getPost());exit;
            $serviceprovider = new Appointments();
            $form->setData($request->getPost());
            $form->setInputFilter($serviceprovider->getInputFilter());
            if ($form->isValid()) {
                $serviceprovider->exchangeArray($form->getData());
                // Inserting appointment data in the database table
                $appnt_id = $appointmentsTable->saveAppointments($serviceprovider);

                return $this->redirect()->toRoute('appointments/appointments', [
                    'action' => 'configurecalendar',
                    'id' => $appnt_id
                ], [
                    "query" => [
                        'email' => $email
                    ],
                    "query" => [
                        'first_name' => $first_name
                    ],
                    "query" => [
                        'phone_number' => $phone_number
                    ]
                ]);
            } else {
                return [
                    'form' => $form
                ];
            }
        }
        // $this->ControllerNav()->initializeNav();
        return [
            'form' => $form
        ];
    }

    public function configurecalendarAction()
    {
        $id = $this->params()->fromRoute('id');
        $email = $this->params()->fromQuery('email');
        $phone_number = $this->params()->fromQuery('phone_number');
        $first_name = $this->params()->fromQuery('first_name');
        $formElementManager = $this->serviceManager->get('FormElementManager');
        $form = $formElementManager->get('Appointments\Form\AppointmentsCalendarForm');
        $appointmentsTable = $this->serviceManager->get('Appointments\Model\AppointmentsTable');

        $form->get('appointment_id')->setValue($id);
        $request = $this->getRequest();
        $appointmentdetails = $appointmentsTable->fetchRowset('appointment_id', $id);
        if ($request->isPost()) {
            // var_dump($request->getPost('appointment_date'));exit;
            $calendar = new Appointments();
            $form->setData($request->getPost());
            $form->setInputFilter($calendar->getInputFilter());

            if ($form->isValid()) {

                $appointmentdetails->appointment_date = $request->getPost('appointment_date');
                $appointmentdetails->appointment_time = $request->getPost('appointment_time');
                // Inserting appointment data in the database table
                $appointmentsTable->saveAppointments($appointmentdetails);

                return $this->redirect()->toRoute('appointments/appointments', [
                    'action' => 'confirmsummery',
                    'id' => $id
                ], [
                    "query" => [
                        'email' => $email
                    ],
                    "query" => [
                        'first_name' => $first_name
                    ],
                    "query" => [
                        'phone_number' => $phone_number
                    ]
                ]);
            } else {
                return [
                    'form' => $form
                ];
            }
        }
        return [
            'form' => $form
        ];
    }

    public function confirmsummeryAction()
    {
        $id = $this->params()->fromRoute('id');
        $email = $this->params()->fromQuery('email');
        $phone_number = $this->params()->fromQuery('phone_number');
        $first_name = $this->params()->fromQuery('first_name');
        return new ViewModel();

        return $this->redirect()->toRoute('appointments/appointments', [
            'action' => 'pay',
            'id' => $id
        ], [
            "query" => [
                'email' => $email
            ],
            "query" => [
                'first_name' => $first_name
            ],
            "query" => [
                'phone_number' => $phone_number
            ]
        ]);
    }

    public function callbackAction()
    {
        try {
            // Set the response content type to application/json
            // header("Content-Type:application/json");
            $resp = '{"ResultCode":0,"ResultDesc":"Validation passed successfully"}';
            // read incoming request
            $postData = file_get_contents('php://input');
            $filePath = "/home/smalio/Sites/stonewebdev/messages.log";
            // error log
            $errorLog = "/home/smalio/Sites/stonewebdev/errors.log";
            // Parse payload to json
            $jdata = json_decode($postData, true);
            // perform business operations here
            // open text file for logging messages by appending
            $file = fopen($filePath, "a");
            // log incoming request
            fwrite($file, $postData);
            fwrite($file, "\r\n");
        } catch (Exception $ex) {
            // append exception to file
            $logErr = fopen($errorLog, "a");
            fwrite($logErr, $ex->getMessage());
            fwrite($logErr, "\r\n");
            fclose($logErr);
            // set failure response
            $resp = '{"ResultCode": 1, "ResultDesc":"Validation failure due to internal service error"}';
        }
        // log response and close file
        // fwrite($file, $resp);
        fclose($file);
        // echo response
        // echo $resp;
    }

    public function payAction()
    {
        $id = $this->params()->fromRoute('id');
        $email = $this->params()->fromQuery('email');
        $formElementManager = $this->serviceManager->get('FormElementManager');
        $form = $formElementManager->get('Appointments\Form\AppointmentsPhoneForm');

        $request = $this->getRequest();
        $appointmentPaymentTable = $this->serviceManager->get('Appointments\Model\AppntPaymentConfirmationTable');
        $appointmentsTable = $this->serviceManager->get('Appointments\Model\AppointmentsTable');

        if ($request->isPost()) {

            // header("Content-Type:application/json");
            $phone = $request->getPost('phone_number');

            // $validationurl = "enteryourvalidationurlhere";
            // $confirmationurl = "enteryourconfirmationurlhere";

            /* testing environment, comment the below two lines if on production */
            $authenticationurl = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

            $registerurl = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';

            /* production un-comment the below two lines if you are in production */
            // $authenticationurl=’https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials’;
            // $registerurl = ‘https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl’;
            // $credentials = base64_encode($consumerkey . ':' . $consumersecret);

            // Request headers
            $headers = [
                'Content-Type: application/json; charset=utf-8'
            ];

            // Request
            $ch = curl_init($authenticationurl);

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            // curl_setopt($ch, CURLOPT_HEADER, TRUE); // Includes the header in the output
            curl_setopt($ch, CURLOPT_HEADER, FALSE); // excludes the header in the output
            curl_setopt($ch, CURLOPT_USERPWD, $this->saf_consumerkey . ":" . $this->saf_consumersecret); // HTTP Basic Authentication
            $result = curl_exec($ch);
            curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $result = json_decode($result);
            $access_token = $result->access_token;
            curl_close($ch);
            $date = time();
            $timestamp = date("Ymdhms", $date);
            $password = base64_encode($this->saf_shortcode . $this->saf_passkey . $timestamp);
            // echo $password;
            $transactiondesc = "Successful";
            $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
            $curlInitResult = curl_init($url);
            curl_setopt($curlInitResult, CURLOPT_URL, $url);
            curl_setopt($curlInitResult, CURLOPT_HTTPHEADER, array(
                'Content-Type:application/json',
                'Authorization:Bearer ' . $access_token
            )); // setting custom header
            $curl_post_data = [
                // Fill in the request parameters with valid values
                'BusinessShortCode' => $this->saf_shortcode,
                'Password' => $password,
                'Timestamp' => $timestamp,
                'TransactionType' => 'CustomerPayBillOnline',
                'Amount' => '5',
                'PartyA' => $phone,
                'PartyB' => $this->saf_shortcode,
                'PhoneNumber' => $phone,
                'CallBackURL' => $this->saf_callbackurl,
                'AccountReference' => 'Afya',
                'TransactionDesc' => $transactiondesc
            ];
            // $CallbackURL = 'https://webhook.site/adca9f7a-5471-4464-b493-4d05251ec658';
            $data_string = json_encode($curl_post_data);
            curl_setopt($curlInitResult, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curlInitResult, CURLOPT_POST, true);
            curl_setopt($curlInitResult, CURLOPT_POSTFIELDS, $data_string);

            curl_exec($curlInitResult);
            // THIS IS WHERE THE ERROR IS

            $file = "/home/smalio/Sites/stonewebdev/messages.log";
            // if(file_exists($file)){
            // }
            fopen($file, "r");
            $safResp = filek_get_contents($file);
            $decoded = json_decode($safResp, true);
            $flatArray = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($decoded));
            $list = iterator_to_array($flatArray, false);
            if (count($list) == 13) {
                unset($list[4], $list[6], $list[8], $list[9], $list[11]);
                $list = array_merge($list);
                $mpesapayment_details = [
                    'appnt_payment_confirmation_id' => '',
                    'merchant_request_id' => $list[0],
                    'checkout_request_id' => $list[1],
                    'result_code' => $list[2],
                    'result_desc' => $list[3],
                    'service_cost' => $list[4],
                    'mpesa_transaction_id' => $list[5],
                    'mpesa_transaction_date' => $list[6],
                    'appnt_user_phone_number' => $list[7]
                ];
                // save to the database
                $appntPaymentmodel = new AppntPaymentConfirmation();
                $appntPaymentmodel->exchangeArray($mpesapayment_details);
                $payment_id = $appointmentPaymentTable->saveAppntPaymentConfirmation($appntPaymentmodel);
                if ($payment_id != null) {
                    $appointmentdetails = $appointmentsTable->fetchRowset('appointment_id', $id);
                    $appointmentdetails->appointment_status = 1;
                    $appointmentsTable->saveAppointments($appointmentdetails);
                    // send an email to the user
                    $subject = 'Appointment Booking Successfull';
                    $mail_client = new Mail\Message();
                    $mail_client->setBody('This is the text of the email.');
                    $mail_client->setFrom('afyaresearch@gmail.com', 'Afya Research Africa');
                    $mail_client->addTo($email, 'Client');
                    $mail_client->setSubject($subject);
                    $transport = new Mail\Transport\Sendmail();
                    $transport->send($mail_client);
                }
            } else {
                echo "please check your details carefully";
                $mail_client = new Mail\Message();
                $mail_client->setBody('You tried. Did you manage?.');
                $mail_client->setFrom('afyaresearch@gmail.com', 'Afya Rfesearch Africa');
                $mail_client->addTo($email, 'Client');
                $mail_client->setSubject('Booking Appointment');
                $transport = new Mail\Transport\Sendmail();
                $transport->send($mail_client);
            }
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

    public function smsAction()
    {
        require 'vendor/autoload.php';
        // Set your app credentials
        $username = "stoneweb";
        $apikey = "66b45264697cff69fd0f61b0f81ee0607e9a8ec976f22608ed8895360ba3ac90";

        // Initialize the SDK
        $AT = new AfricasTalking($username, $apikey);

        // Get the SMS service
        $sms = $AT->sms();

        // Set the numbers you want to send to in international format
        $recipients = "+254701926294";

        // Set your message
        $message = "Lets chnage the topic for a moment. Why is it not possible anyway";

        // Set your shortCode or senderId
        $from = "66140";

        try {
            // Thats it, hit send and we'll take care of the rest
            $result = $sms->send([
                'to' => $recipients,
                'message' => $message,
                'from' => $from
            ]);
            print_r($result);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteAction()
    {
        // return $this-> appointments -> $appointmentsService->AppointmentsUsersTable()->fetchAll();
    }

    public function editAction()
    {
        // return $this-> appointments -> $appointmentsService->AppointmentsUsersTable()->fetchAll();
    }
}
