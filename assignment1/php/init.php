<?php 
session_start();

//Remove whitespaces , remove extra slashes, and convert to safe html characters
//USE FOR ALL USER INPUT
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }



?>