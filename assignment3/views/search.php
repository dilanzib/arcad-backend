<?php include "../components/head.php" ?>
<?php include "../components/init.php" ?>
<?php include "../components/navbar.php" ?>

   
        <article>
            <h2>Sök kommentar: </h2> 
            <form  method="post" action="search.php"> 
	            <input  type="text" name="sok"> 
	            <input  type="submit" name="submit" value="Sök"> 
           </form> <br>
        
        </article>   

        <?php
    if (isset($_POST["sok"])) {
        $conn = create_conn();

     $query = test_input($_POST["sok"]); 
     $min_length = 2;  
     
     
    if(strlen($query) >= $min_length){ 
         
         
        $sql = "SELECT * FROM blog
            WHERE `comment` LIKE '%".$query."%' OR `name` LIKE '%".$query."%'";
        $result = $conn->query($sql); 

         
        if ($result->num_rows > 0){ 
             
            while ($results = $result->fetch_assoc())
            { 
                echo  "<b><i> ". $results["name"] . " </i></b>" . $results["date"] . "<br>" ; 
                echo  "<b> Kommentar: </b> " . $results["comment"] ."<br><br>";
            }
             
        }
        else{ 
            echo "Inga resultat"; 
        }
         
    }
    else{
        echo "Minimum längden är ".$min_length;  
    }
} else {
    $conn = create_conn();
    $sql = "SELECT * FROM blog ORDER BY id DESC"; 
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            echo   "<b>" . $row["name"] . " </b>  <i>" . $row["date"] . "</i><br>" ; 
            echo  "<b> Kommentar: </b> " . $row["comment"] ."<br><br>";
            
            if(isset($_SESSION["role"]) && ($_SESSION["role"] == "admin" || $_SESSION["role"] == "editor")){
                echo "<a href='../models/edit.php?id=".$row["id"]."'> Editera </a>";
                echo "<a href=\"../models/delete.php?id=".$row["id"]." \" onClick=\"return confirm('Är du säker?')\"> Radera </a><br><br>"; 
            }
        }
    } else {
        echo "Finns inga kommentarer";
    }

    $conn->close();
}

?>


    </section>
</body>
</html>