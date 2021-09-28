<?php
require 'connect.php';

 $postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  $request = json_decode($postdata);

  //print_r($request);
  
  // Sanitize.
  $username = $con->real_escape_string(trim($request->username));
  $password = $con->real_escape_string(trim($request->password));
  $firstname = $con->real_escape_string(trim($request->firstName));
  $lastname = $con->real_escape_string(trim($request->lastName));
  $age = $con->real_escape_string(trim($request->age));
  $salary = $con->real_escape_string(trim($request->salary));
  

  // Store.
  $sql = "INSERT INTO `register`(
     `username`,
     `password`,
     `first_name`,
     `last_name`,
     `age`,
     `salary`
 ) VALUES
  ('{$username}',
  '{$password}',
  '{$firstname}',
  '{$lastname}',
  '{$age}',
  '{$salary}'
  )";

  if($con->query($sql))
  {
    http_response_code(201);
  }
  else
  {
    http_response_code(422);
  }
}