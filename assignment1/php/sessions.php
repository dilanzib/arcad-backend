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
            <h2>Uppgift 6</h2>
            <h1>Sessioner</h1>
            <p>Var god och logga in!</p>
            <form action="sessions.php" method="post">
                Användare: <input type="text" name="user" required><br>
                Lösenord: <input type="password" name="los" required><br>
                <input type="submit" name="skicka" value="Skicka">
            </form>
            
        </article>

    

        <article>

            <?php
        //Kolla ifall man försöker logga in    
        if (isset($_POST["user"])) {
            //Gör input data ofarlig
            $user = test_input($_POST["user"]);
            $los = test_input($_POST["los"]);
            
        //TODO: Tillåt endast ifall anv och lösenord är rätt 
        if ($user == "alfons"  && $los ="alfons123"){
            print("<br>Hemligheter för Alfons");
            //Gör alfons inloggad med att spara i $_SESSION storage
            $_SESSION["user"] = $user;
            //visa hemlis edast för alfons
            print("<a href='./hemlis.php'><br>Min dagbok</a>");
        } else if ($user == "dennis" && $los ="dennis123"){
            print("<br>Hemligheter för Dennis! ");
            $_SESSION["user"] = $user;
            print("<a href='./hemlis2.php'><br>Privata sidan</a>");
        } else if ($user == "dilan" && $los ="dilan123"){
            print("<br>Hemligheter för Dilan! ");
            $_SESSION["user"] = $user;
            print("<p><b> Mina anteckningar : </b></p>");
            print("<a href='./hemlis3.php'><br>Anteckningar Lektion 1</a><br>");
            print("<a href='./hemlis4.php'><br>Anteckningar Lektion 2</a>");
        }
        else {
            print("Vi känner inte igen dig!");
        }

    }

    
    ?>
        </article>
    </section>
</body>
</html>
