<?php
require 'connect.php';

// Get the posted data.

$postdata = file_get_contents("php://input");

//print_r($postdata);

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
	

  // Sanitize.
  $id = $con->real_escape_string(trim($request->id));
  $username = $con->real_escape_string(trim($request->username));
  $firstName = $con->real_escape_string(trim($request->firstName));
  $lastName = $con->real_escape_string(trim($request->lastName));
  $age = $con->real_escape_string($request->age);
  $salary = $con->real_escape_string($request->salary);
  // Update.
   $sql = "UPDATE `register` SET 
   `username`='$username',
   `first_name`='$firstName',
   `last_name`='$lastName',
   `age`='$age',
   `salary`='$salary'
    WHERE `id` = '{$id}' LIMIT 1";

  if($con->query($sql))
  {
    //http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }  
}
