<?php

    function sendSMS($obj) {

        $url = "https://rest.clicksend.com/v3/sms/send";
        $auth_key = "Basic amFuYW5pLml0MjBAYml0c2F0aHkuYWMuaW46RkExQ0FGQjktQ0M1QS1FQzExLUZDNjgtMTQ0Njg3NzMzOERC";

        $options = array(                                   
                'http' => array(
                    'header'  =>
                    "Content-Type: application/json\r\n" .
                    "Authorization: " . $auth_key . "\r\n",
                    'method'  => 'POST',
                    'content' => $obj
                    )
            );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) { 
            echo "Something went wrong in sending SMS!";
        } else {
            echo "SMS Sent Successfully!";

        }

    }

?>