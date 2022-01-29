<?php
include "../components/init.php";

if(isset($_SESSION["role"]) && ($_SESSION["role"] == "admin" || $_SESSION["role"] == "editor")){

    if(isset($_GET["id"])){

        $conn = create_conn();
        
        $id = test_input($_GET["id"]);
    
        $statement = $conn->prepare("DELETE FROM blog WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();

        header("location:../views/search.php");
        exit();
    }
}
else{
    header("location:../views/search.php");
}

?>