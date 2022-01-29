<?php include "../components/head.php" ?>
<?php include "../components/init.php" ?>
<?php include "../components/navbar.php" ?>


        <article>

            <?php
        //kolla att endast den inloggade anändaren får se på sin egna profilsida
        if (isset($_SESSION['user'])) {
            echo "<h2> ". $_SESSION['user'] . "'s " . " Profilsida</h2>";

            $anv = test_input($_SESSION['user']);
            //TODO: visa profilsida
            $conn = create_conn();
            $stmt = $conn->prepare("SELECT * FROM users WHERE namn = ?");
            $stmt->bind_param("s", $anv);
            $stmt->execute();
            $result=$stmt->get_result();
            $row = $result->fetch_assoc();
            echo "<b>Namn: </b>" . $row['namn'] . "s profil:<br>";
            echo "<b>E-mail: </b> " . $row['epost'] . "<br>";
            echo "<b>Id: </b> " . $row['id'] . "<br>";

            //DEHÄR TVÅ SQL KOMMANDON GÅR ATT KOMBINERA TILL EN SQL INNER JOIN



            //TODO: hitta profilbilden och skriv ut den
            $userID = $row['id'];
            $stmt = $conn->prepare("SELECT * FROM files WHERE userID = ? ORDER BY id DESC"); //quick fix för nyaste filen (ASC / DESC)
            $stmt->bind_param("i", $userID);
            $stmt->execute();
            $result=$stmt->get_result();
            $rowe=$result->fetch_assoc();
            echo "<b>Profilbild: </b> <br><img src='" . $rowe['filnamn'] . "'><br>";
        

            $conn->close();
            echo "
            <article>
            <h1>Här kan du byta profilbild: </h1>

            <form action='../models/profile.php' method='post' enctype='multipart/form-data'>
              Välj din fil : 
              <input type='hidden' name='id' value='". $userID ."'>
              <input type='file' name='fileToUpload' id='fileToUpload'>
              <input type='submit' value='Ladda upp filen!' name='submit'>
            </form>
        </article>";
   



        }else {
            echo "Du kan inte se på någon annans profil!";
        }

            ?>
        </article>
    </section>
</body>
</html>