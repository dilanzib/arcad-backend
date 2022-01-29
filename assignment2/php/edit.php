<?php include "init.php" ?>
<?php include "head.php" ?>

<?php 
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn -> set_charset('utf-8');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = test_input($_GET["id"]);
    
    $sql = "SELECT * FROM loppis WHERE id = $id";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            $rubrik = $row["rubrik"];
            $beskrivning = $row["beskrivning"];
            $pris = $row["pris"];
        }

    } 
    else {
       echo "Något gick fel..";
    }
    $conn->close();
    

?>


<body>
    <section>

            <?php include "navbar2.php" ?>
            <h2>Editera inlägget </h2>

            <article>
                <form action="change.php?id=<?php print($id)?>" method="POST" required>
                    Namn: <br><input type="text" name="rubrik" value="<?php print($rubrik);?>"required><br>
                    Beskrivning: <br><textarea name="beskrivning" required><?php print($beskrivning);?></textarea><br>
                    Pris:<br><input name="pris" value="<?php print($pris);?>"required><br>
                    <input type="submit" value="Spara ändringar" name="spara">
                </form>

            </article>

    </section>

</body>