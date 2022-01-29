<?php include "../components/head.php" ?>
<?php include "../components/init.php" ?>
<?php include "../components/navbar.php" ?>



   <?php

        $conn = create_conn();

        $sql = "SELECT * FROM blog"; 
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
   
            while($row = $result->fetch_assoc()) {
                echo  "<b><i> ". $row["name"] . " </i></b>" . $row["date"] . "<br>" ; 
                echo  "<b> Kommentar: </b> " . $row["comment"] ."<br>";
                
                if(isset($_SESSION["role"]) && ($_SESSION["role"] == "admin" || $_SESSION["role"] == "editor")){
                    echo "<a href='edit.php?id=".$row["id"]."'> Editera </a>";
                    echo "<a href='delete.php?id=".$row["id"]."'> Radera </a><br><br>"; 
                }
            }
        } else {
            echo "Finna inga kommentarer";
        }

        $conn->close();
  ?>




    <!-- en controller
    if (isset($_GET['edit'])){
        echo"<article>";
        //View 1 EDIT 
        echo"<h1> Ändra på en annons </h1>";
        // Redigerinsinterface MODEL
        include "../models/modify.php";
        echo"</article>";

    } else  {

        echo"<article>";
        // View 2 SÖK 
       echo"<h2>Sök inlagg i lopptorget</h2>
        <form  method='get' action='../models/search.php'> 
            <input  type='text' name='query'> 
            <input  type='submit' value='Sök'> 
       </form> ";
         //Sökinterface MODEL 
        include "../models/search.php";
        echo"</article>" ;

    }-->
