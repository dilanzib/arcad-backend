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


function create_conn() {
//Databaskonfiguration
$servername = "localhost";
$username = "zibaridi";
$password = "mymSWwJvpF";
$dbname = "zibaridi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset('utf-8');
// Check connection
if ($conn->connect_error)  {  die("Connection failed: " . $conn->connect_error); } 

return $conn;

}

?>