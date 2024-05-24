<?php
  // PHP code to be executed
  function sendSms() {
    $api_key='b817ac7cc6b14278';
    $secret_key = 'NDRmNWU4YzVhYzc5OWM1YjlmMjI3YmVjMzcxZmRhZmVhNmQ3YmQ0NzE5NTY5ZGZhNGExYjJjNDhmMjdiMTAwMQ==';

    $postData = array(
        'source_addr' => 'INFO',
        'encoding'=>0,
        'schedule_time' => '',
        'message' => 'Hizi show haziendi bila ya .Chart Open Ai',
        'recipients' => [array('recipient_id' => '1','dest_addr'=>'255685078028')]
    );

    $Url ='https://apisms.beem.africa/v1/send';

    $ch = curl_init($Url);
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => array(
            'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
            'Content-Type: application/json'
        ),
        CURLOPT_POSTFIELDS => json_encode($postData)
    ));

    $response = curl_exec($ch);

    if($response === FALSE){
            echo $response;

        die(curl_error($ch));
    }
    var_dump($response);

}

//sendSms();
echo "You Press New Sms file and turn on button"; 
?>