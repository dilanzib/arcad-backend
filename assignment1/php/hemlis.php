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
            <h2>Privat hemsida</h2>
            
        </article>

    

        <article>

            <?php
        //Kolla att man är inloggad
        if (isset($_SESSION["user"]))  {
            //TODO: Kolla vem som är inloggad

            print("<h1> Alfons dagbok </h1>
                  <p> Inlägg 1: Det är min födelsedag idag </p>");
        }  else {
            print("<p> Gå bort!</p>");
            
        }


            
            ?>
        </article>
    </section>
</body>
</html>
