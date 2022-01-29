<?php include "../components/head.php" ?>
<?php include "../components/init.php" ?>
<?php include "../components/navbar.php" ?>

<?php  
//uppdatera files tabellen med användarens nya uppladdade fil
function updateFileTable($filename,$userID){
    echo "Matade in profilbilden " . $filename . " i databasen med " . $userID . "<br>";
    //TODO: uppdatera files databasen, lägg till den nyuppladdade filen 
    $conn = create_conn();
    $stmt = $conn->prepare("INSERT INTO files (userID, filnamn) VALUES (?,?)");
    $stmt->bind_param("is", $userID,$filename);

    if ($stmt->execute()){ //Returnerar true om SQL lyckas, FALSE om SQL misslyckas
    echo "Success";
    }
    $conn->close();
}



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
    echo "<b> Profilbild:</b><br> <img src='" . $rowe['filnamn'] . "'><br>";


    $conn->close();
    echo" 
        <article>
            <h1>Här kan du byta din profilbild: </h1>

            <form action='profile.php' method='post' enctype='multipart/form-data'>
              Välj din fil : 
             <input type='file' name='fileToUpload' id='fileToUpload'>
              <input type='submit' value='Ladda upp filen!' name='submit'>
            </form>
        </article> ";

            //uploads mappen dit filerna skickas
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


            // Kolla om det är bild eller ej
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "<br> <p> Filen är en bild  " . $check["mime"] . ". </p>";
                    $uploadOk = 1;
                } else {
                    echo "<p> Filen är ingen bild!</p>";
                    $uploadOk = 0;
                }
            }
            // Kolla om filen redan finns
            if (file_exists($target_file)) {
                echo "<p> Filen finns redan! </p>";
                $uploadOk = 0;
            }
            //Kolla storleken på filen  , max är 500000
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "<p> Ursäkta, din fil är för stor! </p>";
                $uploadOk = 0;
            }

            //Accepterar endast jpg, png, jpeg och gif filer 
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "<p> Du kan endast ladda upp JPG, JPEG, PNG & GIF filer </p>";
                $uploadOk = 0;
            }


            //Kolla att allt e okej inga errors om de e ==0
            if ($uploadOk == 0) {
                echo "Något gick fel!";
            //om allt e okej ladda upp filen
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "Filen ". basename( $_FILES["fileToUpload"]["name"]). " har laddats upp";

                    $filename = "../uploads/".basename($_FILES["fileToUpload"]["name"]);
                    $userID = test_input($_POST['id']);
                    updateFileTable($filename, $userID);
                } else {
                    echo " <p> <br> Något gick fel!</p>";
                }
        }
         // Sort in ascending order this is default
        //$filer = scandir($target_dir);
        //print_r($filer);
    
        }   else {
        echo "Du kan inte se på någon annans profilsida";
        } 
            
            ?>
        </article>

    </section>
</body>
</html>