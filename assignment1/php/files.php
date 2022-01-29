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

            <h1>Visa dina uppladdningar</h1>
            <a href='./uploads.php'>Bilderna</a><br>
            <a href="./uploads">Mappen</a>
        </article>
    

        <article>

            <?php

            ?>
        </article>
    </section>
</body>
</html>
