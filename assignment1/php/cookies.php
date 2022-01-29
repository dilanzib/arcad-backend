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
            <h2>Uppgift 5</h2>
            <h1>Cookies</h1>
            
        </article>

    

        <article>

            <?php
            setcookie("user","Dilan Zibari", time()+(86400*30), "/");

            $user= get_current_user(); //$_SERVER["REMOTE_USER"];  //känna igen besökaren
            $lastvisit = time();  //får tiden till första besöket



            setcookie("user", $user, time()+(86400*30), "/"); //86400s = 1 dag dvs expires efter 30 dagar
            setcookie("lastvisit", $lastvisit, time()+(86400*30), "/"); 


            
            if(!isset($_COOKIE["user"])) {
                print("Välkommen till Dilans sida! \n");
                setcookie("firstvisit", time(), time()+(86400*30), "/");
            }
            else {
                print("Välkommen tillbaka " . $_COOKIE["user"] . "!<br>");
                print("Du var här första gången " . date("H:i:s  d.m.Y", $_COOKIE["firstvisit"]) . " <br>");
            }



            if(isset($_COOKIE["user"])) {
            print("<br>Du var här senaste gången " . date("H:i:s  d.m.Y", $_COOKIE["lastvisit"]) ." <br>"); 
            }
            else {
            print("Välkommen till Dilans sida! \n");
            }




            ?>
        </article>
    </section>
</body>
</html>