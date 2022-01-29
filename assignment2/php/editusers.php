<?php include "init.php" ?>
<?php include "head.php" ?>

<?php 
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn -> set_charset('utf-8');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = test_input($_GET["id"]);
    
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            $namn= $row["namn"];
            $losen = $row["losen"];
            $epost = $row["epost"];
            $roll = $row['roll'];
            $status = $row['status'];
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
            <h2>Editera användarkontot</h2>

            <article>
                <form action="update.php?id=<?php print($id)?>" method="POST" required>
                    Namn: <br><input type="text" name="namn" value="<?php print($namn);?>"required><br>
                    Lösenord: <br><input name="losen" required><?php print($losen);?><br>
                    E-post:<br><input name="epost" value="<?php print($epost);?>"required><br>
                    Roll: <br><input name="roll" value="<?php print($roll);?>"required><br>
                    Status: <br><input name="status" value="<?php print($status);?>"required><br>
                    <input type="submit" value="Spara ändringar" name="spara">
                </form>

            </article>

    </section>

</body>