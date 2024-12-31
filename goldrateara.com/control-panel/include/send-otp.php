<?php
 function send_opt($To,$msg){
    return 1;
} 

function send_opt1($To,$msg){
	
/*Send SMS using PHP*/    
    //Your authentication key
    //$authKey = "gnhhnhn";
    $authKey = "225878A9DJRGuxZQ5b483928";
    
    //Multiple mobiles numbers separated by comma
    $mobileNumber = $To;
    
    //Sender ID,While using route4 sender id should be 6 characters long.
    $senderId = "LightW";
    
    //Your message to send, Add URL encoding here.
    $message = urlencode($msg);
    
    //Define route 
    $route = "4";
    //Prepare you post parameters
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );
    
    //API URL
    $url="https://control.msg91.com/api/sendhttp.php";
    
    // init the resource
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true
    ));
    

    //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    
    //get response
    $output = curl_exec($ch);
    
    //Print error if any
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
    }
    
    curl_close($ch);
    
    return $output;
}


?>

