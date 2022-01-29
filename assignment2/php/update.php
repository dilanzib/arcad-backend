<?php
include "init.php";
if(isset($_SESSION["role"]) && ($_SESSION["role"] == "admin" || $_SESSION["role"] == "editor")){

    if(isset($_POST["spara"])){

        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->set_charset("utf-8");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $namn = test_input($_POST["namn"]);
        $losen = test_input($_POST["losen"]);
        $epost = test_input($_POST["epost"]);
        $roll = test_input($_POST["roll"]);
        $status = test_input($_POST["status"]);
        $id = test_input($_GET["id"]);

        $statement = $conn->prepare("UPDATE users SET namn = ?, losen = ?, epost = ?, roll = ?, status = ? WHERE id = ?");
        $statement->bind_param("sssssi", $namn, $losen, $epost, $roll, $status, $id);
        $statement->execute();
       
        header("location:home.php");
        exit();
    }
}
else{
    header("location:home.php");
}

?>
