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

            print("<h1>Anteckningarna till lektion 1 <br> Den globala uppvärmningen</h1>

                  <p> 
                  Men även om vi lyckas med det kommer konsekvenserna i världen vara stora. Några av de effekter som den samlade forskningen slår fast kommer att inträffa  vid en uppvärmning på 1,5 till 2 grader är:<br>

                  <br><b>Värmeböljor:</b> Omkring 14 procent av världens befolkning kommer att utsättas för extrema värmeböljor minst en gång vart femte år om medeltemperaturen ökar med 1,5 grader. Överstiger temperaturökningen två grader kommer över en tredjedel av världens befolkning (37 procent) att utsättas för samma risk.<br>
                    
                    <br><b>Stigande havsyta:</b> I en värld med 1,5  graders högre medeltemperatur än i dag beräknas havsytan stiga med 40 centimeter till år 2100. Vi två graders uppvärmning stiger samma siffra till 46 centimeter. <br>
                    
                    Det kan låta som en ganska liten förändring, men en sådan höjning skulle göra att omkring en tiondel av Bangladesh skulle hamna under vatten. <br>
                    
                    Det finns också studier som talar om en betydligt kraftigare havsytehöjning, upp till två meter på hundra år. Hur mycket det faktiskt blir beror till exempel på så kallade tröskeleffekter, ifall kritiska värden kommer att överstigas som gör att jorden kan bli självuppvärmande.<br>
                    
                    Havsytehöjningen gör dessutom kuster mer sårbara för översvämning från höga tidvatten, stormar och orkaner. Låglänta delar av kuststäder, som Calcutta och Bombay i Indien eller Miami och New York i USA, kan periodvis komma att läggas under vatten.<br>
                    
                    <br><b>Döda korallrev:</b> Korallreven är mycket känsliga för temperaturförändringar och riskerar att försvinna helt och hållet. Vid 1,5 graders uppvärmning riskerar 90 procent av världens korallrev att helt försvinna. Vid två graders uppvärmning hotas alla världens korallrev, så mycket som 99 procent kommer att försvinna. Därmed hotas också alla de arter som lever i och kring korallreven.<br>
                    
                    Förändrade ekosystem: Många av världens ekosystem kommer inte att kunna anpassa sig till ett förändrat klimat när uppvärmningen går så fort som den gör. Istället riskerar de att omvandlas till helt nya typer av områden. Ett ekosystem som pekas ut som särskilt känsligt för detta är den boreala skogen i Nordeuropa, alltså den gran-och tallskog som vi har mycket av här i Sverige. <br>
                    
                    <br><b>Minskade skördar:</b> Torka och vattenbrist kommer att leda till minskade skördar i stora delar av världen. Vid två graders temperaturökning beräknas majskördarna i tropiska områden minska med 7 procent. Det låter kanske inte som så mycket, men med tanke på att jordens befolkning samtidigt kommer att öka kommer det att få förödande konsekvenser. l. <br>
                    
                    Obeboliga områden: Redan i dag tvingas mellan 15 och 20 miljoner människor om året att överge sina hem på grund av väderrelaterade naturkatastrofer. Antalet hemlösa efter extrema väderhändelser förväntas öka kraftigt i ett varmare klimat. Många människor bor i dag i sårbara områden, och antalet ökar i takt med att allt fler bosätter sig i låglänta kustområden och sårbara städer i fattiga länder.<br><br>
                  </p> ");

        }  else {
            print("<p> Gå bort!</p>");
            
        }


            
            ?>
        </article>
    </section>
</body>
</html>
