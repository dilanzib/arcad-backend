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

            print("<h1> Dennis privata sida </h1>
                  <p> Inlägg 1: Jag har köpt en ny moped idag </p><br>
                  <p> Inlägg 2: Jag tog en bild på mopeden </p> <br>
                  <img src='./img/emoppe.jpg' alt='Emoppe'  height='250' width='250'><br>
                  <p>Inlägg 3: Idag är en bra dag! </p>

                 ");

        }  else {
            print("<p> Gå bort!</p>");
            
        }


            
            ?>
        </article>
    </section>
</body>
</html>
