<?php 
session_start();
//X34R  - I kraft i 30 min 


//Remove whitespaces , remove extra slashes, and convert to safe html characters
//USE FOR ALL USER INPUT
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


//Databaskonfiguration
$servername = "localhost";
$username = "zibaridi";
$password = "mymSWwJvpF";
$dbname = "zibaridi";



?>