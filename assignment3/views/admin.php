<?php include "../components/head.php" ?>
<?php include "../components/init.php" ?>
<?php include "../components/navbar.php" ?>

    <article>
        <h2>Användarkonton</h2>
    </article>    



    <?php  
    if(isset($_SESSION["role"]) && ($_SESSION["role"] == "admin" )) {
        $conn = create_conn();
    
    
    $sql = "SELECT * FROM users"; 
    $result = $conn->query($sql); 
    
    if ($result->num_rows > 0) {
    
        echo "<table><tr><th>ID</th><th>Namn</th><th>Lösenord</th><th>E-post</th><th>Roll</th><th>Status</th>";
    
        while($row = $result->fetch_assoc()) {
             echo "<tr><td>" . $row["id"] ."</td><td>". $row["namn"]. "</td><td> " . $row["losen"].
                  "</td><td> " . $row["epost"]. "</td><td> " . $row["roll"]. "</td><td> " . $row["status"].  "</td><td><a href=\"../models/delete2.php?id=".$row['id']. "
                  \" onClick=\"return confirm('Är du säker?')\"
                  > Radera </a></td>";
              
            echo 
                 "<td><a href=\"../models/edit2.php?id=".$row['id']. "
                 \" \"
                 > Edit </a> </td></td></tr>";
                
        }
    } else {
        echo "Inga resultat";
    }
    } else {
        $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error)  {  die("Connection failed: " . $conn->connect_error); }
    
    
    $sql = "SELECT * FROM users"; 
    $result = $conn->query($sql); 
    
    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
            echo "<b>Användare: </b>" . $row["namn"] . "<br>";
        }
    } else {
        echo "Inga resultat";
    }
        
    }
    $conn->close();


    ?>


    </section>
</body>
</html>
