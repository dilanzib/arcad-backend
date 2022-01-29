<?php
include "init.php";

if(isset($_SESSION["role"]) && ($_SESSION["role"] == "admin" || $_SESSION["role"] == "editor")){

    if(isset($_GET["id"])){

        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->set_charset("utf-8");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $id = test_input($_GET["id"]);
    
        $statement = $conn->prepare("DELETE FROM loppis WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();

        header("location:2hand.php");
        exit();
    }
}
else{
    header("location:home.php");
}

?>