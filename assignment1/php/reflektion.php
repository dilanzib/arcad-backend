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
            <h2>Reflektion och Feedback</h2>
            <p>Länk till TXT-filerna</p> <a href="./TXT">TXT</a> 
            <h1>Uppgift 1</h1>
            <p>Uppgift 1 var ganska lätt, det var bara att $_SERVER["..."] och skriva in dit det som man ville ha. Man hittade 
                lätt det som man skulle skriva dit från w3schools. Användarnamnet fick jag inte först med $_SERVER funktionen
                men jag fick den sedan med get_current_user(); funktionen. Senare fick jag höra på lektionen att den inte fungerar
                på localhost. PHP versionen fick jag också med phpversion(); och apache versionen apache_get_version();. 
            </p>
            <h1>Uppgift 2</h1>
            <p>
                Tid och datum uppgiften var också helt okej. För att få datumet idag använde jag date('d-m-Y', time()), men den visade 
                ändå fel och då lade vi till date_default_timezone_set("Europe/Helsinki"). Månaden fick jag med date('F'), veckodagen 
                date('l') och veckonumret date('W'); 

                Det som var lite svårare var att få det till svenska. Jag gjorde först funktioner som skulle få orden från 
                engelska översatta till svenska, och det fungerade på min dator, men inte på skolans. Därför gjorde jag sedan 
                arrays med de svenska månaderna och veckodagarna. Jag fick sedan det "översatt" till svenska med funktionen
                <b>$days[date("W")-1]</b> och <b>$months[date("m")-1]</b>.
            </p>
            <h1>Uppgift 3</h1>
            <p>
                Vid uppgift 3 lade vi till en form där personen skriver in dag och månad. Vi inkludera en annan fil 
                datumRakna.php dit där den ska räkna ut hur många dagar/timmar/sekunder det är dit.  Vid datumRakna.php checka vi först
                om personen har skrivit in rätt månad och dag, med en if sats. Datumen och tiden fick jag på samma sätt som uppgift 2,
                dvs. date("d.m.Y - H:i:s"). 
                Sedan checka jag om det är i framtiden eller förfluten tid med en if sats om (giventid > nutid eller ej). Beroende på om det 
                var i framtiden eller förfluten tid , fick jag tiden emellan genom att ta differensen mellan $giventid och $nutid. Jag fick 
                sedan dagarna i millisekunder och fick det till hela dagar, timmar och sekunder med modula %. Dagarna fick jag genom att ta 
                dividerat med (60*60*24), timmar (60*60) % 24, minutrar (60) % 60 och sekunder % 60. 
            </p>
            <h1>Uppgift 4</h1>
            <p>
                Vid registrering gjorde jag som vanligt en form där personen kan skriva in sitt användarnamn och e-post.
                Checka först med isset metoden, och checka sedan inputet i epost och användarnamnet. Jag checkade sedan om det var ett riktigt 
                e-post adress med en inbyggd funktion och om det inte var det skulle den säga att personen ska mata epost-adressen pånytt. 
                I uppgiften skulle man skicka sedan en välkomstmail med ett random lösenord. Lösenordet skapade jag med att shuffla bokstäver och siffror
                som jag sparat i en variabel. Det var inte heller svårt att skicka mailet till det givna epost adressen, men funktionen 
                mail($to, $subject, $message), gick det bra. 
            </p>
            <h1>Uppgift 5</h1>
                <p>
                Den här uppgiften var väldigt svår för mig. Vi började med att liksom först känna igen användaren genom get_current_user();, 
                och sedan "spara" den cookien med setCookie funktionen. Tiden tog vi även adderat med (86400*30) för att cookien ska expire efer 30 dagar. 
                Det svåra var att på något sätt spara tiden på första besöket. Men småningom kom vi på med isset() funktionen, om inte cookien var set 
                <b>( !isset($_COOKIE["user"]) ) </b> lägger den en ny cookie för firstvisit och sparar tiden. Men om cookien user var set från tidigare
                säger den tiden för första besöket.
                </p>
            <h1>Uppgift 6</h1>
            <p>
            I session uppgiften gjorde vi först en helt vanlig form när personen ska skriva in sitt användarnamn och lösenord för att få tillgång
            till personens privata sida. Checkade först helt vanligt test_input($_POST["..."] för att liksom få validation av inputet. 
            Sedan gjordes en if sats om user = .. och los = ... så öppnades den privata sidan. Det var inga svårigheter med denna uppgift.
            </p>
            <h1>Uppgift 7</h1>
            <p>
            Det fanns en väldigt bra tutorial på w3schools till denna filuppladdning uppgiften. Först gjordes en form på sidan där 
            personen ska kunna ladda upp en fil, och koppla denna form till en annan fil som vi gjorde (upload.php) för att filen ska
            kunna laddas upp. Jag gjorde även en mapp där de uppladdade filerna skulle finnas. Sedan gjorde jag även en till fil 
            uploads.php som skulle visa de uppladdade filerna på sidan och det lyckades.<br>

            Det jobbiga här var att det inte alls fungerade åt mig först och jag förstod inte alls vad problemet var, då jag hade gjort det 
            enligt intruktionerna på w3schools. Men det visa sig vara att man måste ändra rättigheterna på uploads mappen.
            </p>
            <h1>Uppgift 8</h1>
            <p>
            Vid uppgift 8 handlade det mest om att <b>open, read/write, close </b> en fil. Först checkades det om det fanns errors med 
            <b> die("Kunde inte öppna filen!"); </b>. Sedan med <b>fwrite() </b> funktionen skrev vi i den nya textfilen som skapades. 
            När allt var klart, var det bara att stänga filen med <b>fclose()</b>. För att få IP-adressen och tiden var lätt, eftersom det 
            hade man gjort i uppgift 1. Det sista var att räkna raderna och det gick lätt med <b>feof()</b> funktion.

            </p>
            <h1>Uppgift 9</h1>
            <p>
            Gästboken lät svår i början men efter att man gjort uppgoft 7 och 8 gick det bra med 9:an. Gjorde en helt vanlig form där 
            personen ska skriva in sitt namn och en kommentar, och samtidigt sparas tiden. Sedan gjorde jag precis som i uppgift 8 där 
            liksom öppna, skrev, och stängde den nya filen som skapades. <br><br>
            Det som var jobbigare var att reverse textfilen, för att få den senaste kommentaren först. Men jag hittade en funktion och den 
            fungerar bra. <br><br>
            PHP känns iallafall mycket lättare än JS, och svårighets graden på projektet var också helt bra. Jag lär mig bäst såhär att vi går 
            lite igenom på lektionen och så ska man själv försöka på resten. Tycker det ska fortsätta såhär även med live videorna där man ibland 
            kan kolla pånytt det man gjorde på lektionen eller om man inte har möjlighet och komma på lektionen och kan ändå vara med.
            </p>
            
        </article>

    

        <article>

            <?php
    
            ?>
        </article>
    </section>
</body>
</html>