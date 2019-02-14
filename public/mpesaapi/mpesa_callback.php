<?php 
        $this->load->model('AppntMpesaPayment');
        try {
            // Set the response content type to application/json
            header("Content-Type:application/json");
            $resp='{"ResultCode":0,"ResultDesc":"Result message well received"}';
            // read incoming request message body
            $postData = file_get_contents('php://input');
            // open text file for logging messages by appending
            
            $file = fopen("messages.log", "a");
            
            // log response and close file
            fwrite($file, $postData);
            //fwrite($file, $resp);
           // fclose($file);
            // Parse message body to json payload
            $jdata = json_decode($postData, true);
            
//             $flatArray = new RecursiveIteratorIterator(new RecursiveArrayIterator($jdata));
//             $list = iterator_to_array($flatArray, false);
            // var_dump($jdata['PhoneNumber']);
            // var_dump($jdata);
            // Perform business operations here by fecthing the content sent in the result message,
            // Storing values to database and such
            
            
            $MerchantRequestID = $jdata["MerchantRequestID"];
            $CheckoutRequestID = $jdata["CheckoutRequestID"];
            $ResultCode = $jdata["ResultCode"];
            $ResultDesc = $jdata["ResultDesc"];
            $Amount = $jdata["Amount"];
            $MpesaReceiptNumber = $jdata["MpesaReceiptNumber"];
            $Balance = $jdata["Balance"];
            $TransactionDate = $jdata["TransactionDate"];
            $PhoneNumber = $jdata["PhoneNumber"];
            
            $hostname="localhost"; // Host name
            $username="root"; // Mysql username bigsofts_userm
            $password="malio1234"; // Mysql password
            $db_name="stoneweb_developer"; // Database name
          
            try {
                $conn = new PDO($hostname, $username, $password, $db_name);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO mpesaapi(MerchantRequestID, CheckoutRequestID, ResultCode, ResultDesc, Amount,MpesaReceiptNumber,Balance,TransactionDate,PhoneNumber)
          VALUES ('$MerchantRequestID','$CheckoutRequestID','$ResultCode','$ResultDesc','$Amount','$MpesaReceiptNumber','$Balance','$TransactionDate','$PhoneNumber')";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "New record created successfully";
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
            
            $conn = null;
            
        } 
        catch (Exception $ex) {
            // append exception to file
            $errorLog = "errors.log";
            $logErr = fopen($errorLog, "a");
            fwrite($logErr, $ex->getMessage());
            fwrite($logErr, "\r\n");
            
           // $resp = '{"ResultCode": 1, "ResultDesc":"Validation failure due to internal service error"}';
        }
        fwrite($file,$resp);
        fclose($file);
        //echo response
        echo $resp;
    