<?php include "init.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <header>
        <?php include "navbar.php" ?>
    </header>

    <section>

        <article>
            <h2>Uppgift 7</h2>
            <h1>Ladda upp din fil här:</h1>

            <form action="upload.php" method="post" enctype="multipart/form-data">
              Välj din fil : 
             <input type="file" name="fileToUpload" id="fileToUpload">
              <input type="submit" value="Ladda upp filen!" name="submit">
            </form>
        </article>

    

        <article>

            <?php
            //uploads mappen dit filerna skickas
            $target_dir = "uploads/";
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
                echo "Något gick fel \n";
            //om allt e okej ladda upp filen
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "Filen ". basename( $_FILES["fileToUpload"]["name"]). " har laddats upp";
                } else {
                    echo " <p> <br> Något gick fel!</p>";
                }
            }
            
            ?>
        </article>


        <article>
        
        <h1>Visa dina uppladdningar</h1>
            <a href='./uploads.php'>Bilderna</a><br>
            <a href="./uploads">Mappen</a>
            

        </article>

    </section>
</body>
</html>
