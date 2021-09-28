<?php
require 'connect.php';
error_reporting(E_ERROR);
$students = [];
$sql = "SELECT * FROM  register";

if($result = $con->query($sql))
{
  $cr = 0;
  while($row = $result->fetch_assoc())
  {
    $students[$cr]['id']    = $row['id'];
    $students[$cr]['username'] = $row['username'];
    $students[$cr]['firstName'] = $row['first_name'];
    $students[$cr]['lastName'] = $row['last_name'];
    $students[$cr]['age'] = $row['age'];
    $students[$cr]['salary'] = $row['salary'];
    $students[$cr]['images'] = $row['images'];
    $cr++;
  }
    
    //print_r($students);

  echo json_encode($students);
}
else
{
  http_response_code(404);
}
?>