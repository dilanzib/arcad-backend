<?php
include "../components/init.php";

if(isset($_SESSION["role"]) && ($_SESSION["role"] == "admin")){

    if(isset($_GET["id"])){

        $conn = create_conn();
        $id = test_input($_GET["id"]);
    
        $statement = $conn->prepare("DELETE FROM users WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();

        header("location:../views/admin.php");
        exit();
    }
}
else {
    header("location:../views/admin.php");
}

?>