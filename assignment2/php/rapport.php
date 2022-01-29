<?php include "head.php" ?>
<?php include "init.php" ?>

<body>
    <section>
        <?php include "navbar.php" ?>
    
        <article>
            <h2>Rapport</h2>
            <a href="http://people.arcada.fi/~zibaridi/backend2/TXT/"> Textfilerna </a>
            <p>
            <b>Admin </b> user: dilan lösen: dilan123<br>
            <b>Editor </b> user: ladde lösen: jag<br>
            <b>Vanlig user </b> user: lelee lösen: lele<br>
            </p>

            <h1>1. Specifikation</h1>
            <p>Jag bestämde mig för att göra ett lopptorg. Där det finns tre roller: <b>users, editorer och administratörer</b>. Sedan finns det även
            oregistrerade och de kommmer inte åt det.<br>
            Om man har inte loggat in kan alltså bara se rapportsidan och logga in/regristera sig sidorna, och när har loggat in ser nog samma sak bara 
            rättigheterna är olika beroende på rollen man har. Man måste logga in före man kan sälja något på lopptorget. Jag har ocksåskapat två navbar filer, 
            navbar.php och navbar2.php. Dessa två skiljer sig ifrån om användaren är inlogad eller ej.<br><br>

            Såhär ser det ut:<br>
            <b>Oregistrerade: </b><br>
            Kan endast se användarna på sidan och rapportsidan<br>
            <b>Registrerade: </b><br>
            Users: När användren loggat in så förs hen till riktiga sidan där hen kan lägga upp nya annonser på lopptorget och sökmotorn.<br> 
            Editor: Med denna roll kan användaren lägga upp annonser samt editera/radera annonserna.<br>
            Admins: Här ser användaren allt också all informationen om användarkontona och kan editera/radera kontona också.<br><br><br>
            </p>
        </article>  

        <article>
        <h1>2. Databasen</h1>
            <p> 
            Databasen är uppdelad i tabeller <b> users </b> och <b>loppis</b>. I <b> users </b> tabellen finns 7 kolumner; id, namn, losen, epost, roll, status <br>
            och registered. I <b> loppis </b> tabellen finns 6 kolumner; id, rubrik, beskrivning, säljare, pris och datum. <br><br>

            Jag har haft det mycket lättare med php och därför kändes det faktiskt inte så svårt med databaser när vi började med det,<br>
            det var bara annorlunda än vad man var van vid. Däremot när jag försökte läsa om grunderna i SQL (SELECT, INSERT INTO,UPDATE, DELETE, WHERE etc.) förstod jag ingenting utan <br>
            började förstå först då jag gjorde uppgifterna själv. <br>
            </p>

        </article> 

        <article>
        <h1>3. Användarhantering</h1>
            <p> 
            Inloggningen och registreringen gjorde vi på lektionen och det underlätta väldigt mycket. Det som jag sedan själv försökte klura ut men 
            ändå inte fick det och fungera var att få datum för senaste besök och antal besök. Jag trodde först det skulle vara med cookies, så som man 
            hade gjort i första projektet och tänkte att det skulle bli lätt. Men man skulle tydligen skapa nya 2 kolumner i databasen, jag trodde först det räckte med att bara skapa
            kolumnerna men det gjorde det inte, och jag måste koda också för att antalet besök skulle fungera. Det som var jobbigt här var att plötsligt fungerade inte
            registreringen/ log in, då jag måste uppdatera deras kod med de två nya kolumnerna jag lagt till i databasen, och dethär förstod jag inte i början. 
            Till senaste besök hade jag timestamp, current_timestamp() och sedan attributet on update så att det skulle uppdateras. Antal besök hade jag bara som en Int varabel.<br> <br>
            <b> 
            echo "Senaste besök:". $_SESSION['lastvisit']; <br>
            echo "Din ".$_SESSION['visited']." visit på sidan";<br>
            echo "Registrerad: ". $_SESSION["regist"];<br>
            </b>
    
            </p>

        </article> 

        <article>
        <h1>4. Hämta Data</h1>
            <p> 
            Denna uppgift gjordes tillsammans på lektionen. Hämta data från databasen med <b> $sql = "SELECT * FROM users"; </b>. 
            Jag gjorde sedan själv lopptorget, där jag hämtade data från loppis, men det var lätt då vi redan hade gått igenom det med users.
            </p>
        </article> 


        <article>
        <h1>5. Mata in data</h1>
            <p> 
            Denna uppgift gjordes tillsammans i klassen och därför var det inga svårigheter. Det vi gjorde vara att först skapa en form 
            där användaren kan mata in i rutorna och i php koden var det väsentliga detta: 
            <b> $statement = $conn->prepare("INSERT INTO loppis (rubrik, beskrivning, saljare, pris) VALUES (?, ?, ?, ?)");<br>
                $statement->bind_param("sssi", $rubrik, $beskrivning, $saljare, $pris);</b><br><br>

                Det som jag hålld på och glömma var att ändra metoden get till post, efter att allting fungerat. Det blir jobbigt att ändra 
                alla get till post så därför känns det lite onödigt att använda get först.  
            </p>
        </article> 

        <article>
        <h1>6. Ändra information</h1>
            <p> 
            Här har jag skapat två php filer, edit.php och editusers.php. Jag gjorde två stycken för att skilja på om man vill editera annonserna eller 
            användarnkontona. Denna uppgift var jobbig och svår. För mig var det svåraste att liksom sidan ska fatta när den ska editera och vilken som ska editeras, men sen fick jag det 
            genom <b>edit.php?id=".$row["id"]."' </b>.  Jag gjorde sedan en form på edit.php sidan där användaren kan mata in de nya ändringarna. Actionen på formen skulle tas till en annan fil 
            som jag gjorde och där ändrar den uppgifterna i databasen <b>UPDATE loppis SET rubrik = ?, beskrivning = ?, pris = ? WHERE id = ?" </b>. Det som också var svårt var det att 
            man behövde två skilda filer för denna uppgift då jag försökte få allt på en och samma fil.
        </article> 

        <article>
        <h1>7. Ta bort data</h1>
            <p> 
                Denna uppgift var lättare än uppgift 6 då det egentligen var bara <b> DELETE FROM loppis WHERE id = ?</b>, då man redan hade förstått från uppgift 6 att få id:n uppe i sökrutan. Här har jag också
                två filer, en fil som raderar annonserna och den andra användarkontona. 
            </p>
        </article> 

        <article>
        <h1>8. Sök i databasen</h1>
            <p> 
            Sökmotorn klara jag helt bra, det kom flera exempel på nätet och så blev det även mycket lättare när det skillnaden mellan LIKE och LIKE %..% visades på lektionen.
            Man förstod direkt att man ska använda LIKE '%".$query."%' , och där min $query är sökordet. <br>
            Här har jag även en minimum längd som är 2, dvs. om man skriver in en bokstav ger den inga resultat. Min sökmotor söker från annonsens rubrik, pris, säljare 
            och beskrivning.
            </p>
        </article> 

        <article>
        <h1>9. Administration</h1>
            <p> 
            Efter att ha gjort uppgift 6 och 7, var denna uppgift ganska lätt. Jag har inte gjort en "skild" sida för adminen här eftersom redan hade
            användarkontornas information på sidan och lade då bara till två knappar, edit och radera, och samma sak med annonserna på lopptorget. Till användarkontorna
            hämtade jag bara mera data från databasen, så att adminen ser både id, lösenord och all "privat" info också. Det var ganska lätt med koden att endast 
            om användaren är admin, kan hen se de två knapparna och göra ändringarna. Det var bara att lägga till i början av koden  <br>
            <b>if(isset($_SESSION["role"]) && ($_SESSION["role"] == "admin".</b>.<br>
            </p>
        </article> 

        <article>
        <h1>Övrigt</h1>
        <p>
        Projektet var helt kul men betydligt svårare än projekt 1. Det blev också svårare för mig då jag blev sjuk till kodtillfället vi hade 
        och måste då göra allt själv mha googlandet. Nu har jag också blivit van med clockify, och kommer oftast ihåg att lägga på den jämfört
        med början då clockify bara stressa mig mera när jag jobbade.<br> <br>

        Den svåraste uppgiften var deluppgift 6, men det var ändå bra att vi inte gick igenom något smått på lektionen med den då man lärde sig 
        väldigt mycket med att göra allt själv. Eftersom vi ändå hade gått igenom liknande saker.
            </p>
        </article> 






      



    </section>
</body>
</html>
