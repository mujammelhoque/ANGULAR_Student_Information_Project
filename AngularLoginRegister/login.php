<?php
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
// header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");
  $token = null;
  $headers = apache_request_headers();
  //print_r($headers);


 $postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  $request = json_decode($postdata);

  //print_r($request);
  
  // Sanitize.
   $username = $request->username;
   $password = $request->password;
  
  if($username=='pttc' && $password=='pttc'){

   echo json_encode(
            array(
                "message" => "Successful login.",
                "token" => 'Bearer-jsdfnkj223',
                "email" => $username
            ));
         http_response_code(200);
    }
    else{

       // http_response_code(401);
        echo json_encode(array("message" => "Login failed."));
    }
  

}