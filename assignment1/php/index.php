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
            <h2>Hem</h2>
            <p>Back-End Projekt 1</p>
            
        </article>

    

        <article>

            <?php
            //Ska ändra tiden till finsk tid!!
            date_default_timezone_set("Europe/Helsinki");

            // U P P G I F T      1 // 
            print("<h2>Uppg 1 </h2>");
            $serverport = $_SERVER['SERVER_PORT'];
            $dinip = $_SERVER['REMOTE_ADDR'];
            $serverip = $_SERVER['SERVER_ADDR'];
            $namn = get_current_user();
            $servernamn = $_SERVER['SERVER_NAME'];
            $serverlang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];

            $versionapache = apache_get_version();
            $phpversion = phpversion();


            print("Ditt användarnamn är " . $namn . "<br>");
            print("Din IP-adress är " . $dinip . "<br>");

            print("<p>Apache versionen är " . $versionapache . "<br>");
            print("PHP versionen är " . $phpversion . "</p><br>");

            print("Din server snurrar på " . $serverport . "<br>");
            print("Serverns namn är  " . $servernamn . "<br>");
            print("Serverns IP är " . $serverip . "<br>");
            print("Serverns språk är " . $serverlang);



            // U P P G I F T      2 // 
            print("<h2>Uppg 2 </h2>");
            print("<p>Tid och datum</p>");
        
           
            $tid = date("H:i:s");
            print("Tiden är " . $tid ."<br>");

            //get current datum
            $nudate = date('d.m.Y', time());

            print("Datumet är " . $nudate ."<br><br>");
            
            //månaden
            $month = date('F');
            //veckodagen 
            $veckodag = date("l");
            //veckonummer
            $weeknumber = date("W");

            //till svenska
            $months = array("Januari","Februari","Mars","April","Maj","Juni","Juli","Augusti","September","Oktober","November","December");
            $days = array( "Måndag","Tisdag", "Onsdag", "Torsdag", "Fredag", "Lördag", "Söndag");

            print("Månaden är  " . $months[date("m")-1] . "<br>");
            print("Veckodagen är " . $days[date("W")-1] . "<br>");
            
        
            //få bort nollorna i början av veckonumret
            $str = (string)((int)($weeknumber));  
            print("Veckonumret är " . $str ."<br><br>");     

            $mydate=getdate(date("U"));
            print("dvs. det är " . $days[date("W")-1]  ."en" . " den $mydate[mday] " . $months[date("m")-1] . " år $mydate[year] <br>"  );
            
            // U P P G I F T      3 // 
             print("<h2>Uppg 3 </h2>");
             print("<p>Tryck på Formulär</p>");
            
            // U P P G I F T      4 // 
            print("<h2>Uppg 4 </h2>");
            print("<p>Tryck på Registrera</p>");

            // U P P G I F T      5 // 
            print("<h2>Uppg 5</h2>");
            print("<p>Tryck på Cookies</p>");

            // U P P G I F T      6// 
            print("<h2>Uppg 6</h2>");
            print("<p>Tryck på Sessions</p>");


            // U P P G I F T      7 // 
            print("<h2>Uppg 7</h2>");
            print("<p>Tryck på Filer</p>");
            
            // U P P G I F T      8 // 
            print("<h2>Uppg 8</h2>");

            //Besöksräknare
            include "besok.php";


            // U P P G I F T      9 // 
            print("<h2>Uppg 9</h2>");
            print("<p>Tryck på Gästbok</p>");


            
            ?>
        </article>
    </section>
</body>
</html>
