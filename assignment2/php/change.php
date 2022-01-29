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

        $rubrik = test_input($_POST["rubrik"]);
        $beskrivning = test_input($_POST["beskrivning"]);
        $pris = test_input($_POST["pris"]);
        $id = test_input($_GET["id"]);

        $statement = $conn->prepare("UPDATE loppis SET rubrik = ?, beskrivning = ?, pris = ? WHERE id = ?");
        $statement->bind_param("ssii", $rubrik, $beskrivning, $pris, $id);
        $statement->execute();
       
        header("location:2hand.php");
        exit();
    }
}
else{
    header("location:2hand.php");
}

?>
