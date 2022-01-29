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
            <h1>Datum Räknare</h1>
            <p><b>Hur lång tid är det till det inmatade datumet?</b></p>
        </article>

        <article>

            <?php
            date_default_timezone_set("Europe/Helsinki");
            $date = $_POST["dag"];

            
            print("<p> Du matade in dagen " . $date . "</p>");

            //kolla om dagen är OK
            if (isset($_POST["submit"])){
                print("<p>Låt oss räkna hur många dagar det är till datumet du matat in...</p>");

                //kolla hur långt det är till dagen 
                $tidnu = time();
                $date = $_POST["dag"];
                $date_arr = explode("-", $date);
                $giventid = mktime(0,0,0,$date_arr[1], $date_arr[2], $date_arr[0]);
        
                /*print("<p> Du matade in " . $giventid . " dagen (i millisekunder)<br>");
                print("Det är nu " . $tidnu . " dagen (i millisekunder) </p>");*/
             


                if( $giventid > $tidnu) {
                    $t = ($giventid - $tidnu);

                    print("<p> Datumet idag är " . date("d.m.Y") . " och veckodagen är " . date("l") . "<br>");
                    print("Inmatade datumet är " . date("d.m.Y", $giventid) . " och veckodagen är " . date("l",$giventid) . "</p>" );
                    $dagar = $t / (60*60*24);
                    $timmar = $t / (60*60) % 24;
                    $minut = $t / (60) % 60;
                    $sekunder = $t % 60;
                    print("Det är om " . $dagar . " dagar i <b>framtiden</b>");
                    print("<br> dvs. " . floor($dagar) . " dagar och " . $timmar . " timmar och " . $minut . " minuter " . $sekunder . " sekunder. ");


                    
                } 
                else if ($giventid < $tidnu) {
                    $t = ($tidnu - $giventid);
                    
                    print("<p> Datumet idag är " . date("d.m.Y") . " och veckodagen är " . date("l") . "<br>");
                    print("Inmatade datumet är " . date("d.m.Y", $giventid) . " och veckodagen är " . date("l",$giventid) . "</p>" );
                    $dagar = $t / (60*60*24);
                    $timmar = $t / (60*60) % 24;
                    $minut = $t / (60) % 60;
                    $sekunder = $t % 60;
                    print("Det har gått " . $dagar . " dagar i <b>förfluten tid</b>");
                    print("<br> dvs. det har gått " . floor($dagar) . " dagar och " . $timmar . " timmar och " . $minut . " minuter " . $sekunder . " sekunder. ");
                }
            } 
            else {
                print("<p> Felaktigt inmatad datum!</p>");
            }



            ?>
        </article>
    </section>
</body>
</html>
