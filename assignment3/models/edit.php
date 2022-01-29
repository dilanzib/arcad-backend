<?php include "../components/head.php" ?>
<?php include "../components/init.php" ?>
<?php include "../components/navbar.php" ?>

<?php 
    $conn = create_conn();
    $id = test_input($_GET["id"]);
    
    $sql = "SELECT * FROM blog WHERE id = $id";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            $name = $row["name"];
            $comment = $row["comment"];
        }

    } 
    else {
       echo "Något gick fel..";
    }
    $conn->close();
    
?>


<body>
    <section>

            <h2>Editera inlägget </h2>
            <article>
                <form action="update.php?id=<?php print($id)?>" method="POST" required>
                    Namn: <br><input type="text" name="name" required><br>
                    Kommentar: <br><textarea name="comment" required></textarea><br>
                    <input type="submit" value="Kommentera" name="spara">
                </form>

            </article>

    </section>

</body>