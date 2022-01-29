<?php
include "../components/init.php";
if(isset($_SESSION["role"]) && ($_SESSION["role"] == "admin" || $_SESSION["role"] == "editor")){

    if(isset($_POST["spara"])){

        $conn = create_conn();

        $name = test_input($_POST["name"]);
        $comment = test_input($_POST["comment"]);
        $id = test_input($_GET["id"]);


        $statement = $conn->prepare("UPDATE blog SET name = ?, comment = ? WHERE id = ?");
        $statement->bind_param("ssi", $name, $comment, $id);
        $statement->execute();
       
        header("location:../views/search.php");
        exit();
    }
}
else if (isset($_POST["save"])){
    $conn = create_conn();

    $namn = test_input($_POST["namn"]);
    $losen = test_input($_POST["losen"]);
    $epost = test_input($_POST["epost"]);
    $roll = test_input($_POST["roll"]);
    $status = test_input($_POST["status"]);
    $id = test_input($_GET["id"]);

    $statement = $conn->prepare("UPDATE users SET namn = ?, losen = ?, epost = ?, roll = ?, status = ? WHERE id = ?");
    $statement->bind_param("sssssi", $namn, $losen, $epost, $roll, $status, $id);
    $statement->execute();
   
    header("location:../views/search.php");
    exit();
} else {
    header("location:../views/search.php");
}

?>