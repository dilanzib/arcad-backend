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
            <h2>Uppgift 9</h2>
            <h1>Gästbok</h1>
            <p>Välkommen!</p> 
            <p>Var god och fyll i formuläret! </p>
            <form action="guestbook.php" method="post">
                Namn: <input type="text" name="namn" required><br>
                Kommentar: <input type="text" name="kommentar" required><br>
                <input type="submit" name="skicka" class="submit" value="Skicka">
            </form>
            
        </article>

    

        <article>

            <?php
            //tiden till finlands tid
            date_default_timezone_set("Europe/Helsinki");

            //hur checkar man om nån ha fyllt i eller int?
            if(isset($_POST["namn"])){

            $kommentar = test_input($_POST["kommentar"]);
            $namn = test_input($_POST["namn"]);

            $myfile = fopen("guestbook.txt", "a+") or die("Något gick snett!");
            $date = date("d.m.Y  H:i");
            fwrite($myfile, "<br><b>Namn: </b> " . $namn . " <b>Kommentar: </b> " . $kommentar . " <b>Tid: </b> " . $date . "\n<br>");
            fclose($myfile); 


            /*
            $file = fopen("guestbook.txt", "r");
            $guests = fread($file,filesize("guestbook.txt"));
            echo $guests . "<br>";
            fclose($file);
            */

    
            //nyaste inlägget komme först, dvs. textfilen i reverse
            function rfgets($handle) {
                    $line = null;
                    $n = 0;

                    if ($handle) {
                        $line = '';

                        $started = false;
                        $gotline = false;

                        while (!$gotline) {
                            if (ftell($handle) == 0) {
                                fseek($handle, -1, SEEK_END);
                            } else {
                                fseek($handle, -2, SEEK_CUR);
                            }

                            $readres = ($char = fgetc($handle));

                            if (false === $readres) {
                                $gotline = true;
                            } elseif ($char == "\n" || $char == "\r") {
                                if ($started)
                                    $gotline = true;
                                else
                                    $started = true;
                            } elseif ($started) {
                                $line .= $char;
                            }
                        }
                    }

                    fseek($handle, 1, SEEK_CUR);

                    return strrev($line);
                }

                $filename = 'guestbook.txt';

                echo  PHP_EOL;

                $handle = @fopen($filename, 'r');

                for ($i = 0; $i < 10; $i++) {
                    $buffer = rfgets($handle);
                    echo $buffer . PHP_EOL;
                }

                fclose($handle);

            } 
            else {
                print("<p>Var god och fyll i formuläret! </p>");
            }


        
            ?>
        </article>
    </section>
</body>
</html>