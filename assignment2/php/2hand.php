<?php include "head.php" ?>
<?php include "init.php" ?>

<body>
    <section>
    <?php include "navbar2.php" ?>


        <article>
            <h2>Varor till salu</h2> 
            
        <?php 
        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn -> set_charset('utf-8');

        if ($conn->connect_error)  {  die("Connection failed: " . $conn->connect_error); } 
        else { echo " "; }

        $sql = "SELECT * FROM loppis"; 
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
   
            while($row = $result->fetch_assoc()) {
                echo  "<b> Vara: </b> " . $row["rubrik"] ."<br>";
                echo  "<b> Beskrivning </b> " . $row["beskrivning"] . "<br>"; 
                echo  "<b> Pris: </b> " . $row["pris"]. "€<br>";
                echo  "<b> Säljare: </b> " .$row["saljare"]. "<br>";
                echo  $row["datum"] . "<br><br>";
                
                if(isset($_SESSION["role"]) && ($_SESSION["role"] == "admin" || $_SESSION["role"] == "editor")){
                    echo "<a href='edit.php?id=".$row["id"]."'> Editera </a>";
                    echo "<a href='delete.php?id=".$row["id"]."'> Radera </a><br><br>"; 
                }
            }
        } else {
            echo "Finns tyvärr inga inlägg på lopptorget!";
        }

        $conn->close();
            ?>
        </article>   



    </section>
</body>
</html>