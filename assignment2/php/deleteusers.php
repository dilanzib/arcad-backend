<?php
include "init.php";

if(isset($_SESSION["role"]) && ($_SESSION["role"] == "admin")){

    if(isset($_GET["id"])){

        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->set_charset("utf-8");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $id = test_input($_GET["id"]);
    
        $statement = $conn->prepare("DELETE FROM users WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();

        header("location:home.php");
        exit();
    }
}
else {
    header("location:home.php");
}

?>