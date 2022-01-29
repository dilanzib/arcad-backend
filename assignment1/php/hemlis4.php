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

            print("<h1>Anteckningarna till lektion 1 <br>En 1,5 eller 2 grader varmare värld</h1>
                  <p>
                  <b>Bortom två graders uppvärmning</b><br>
                  Bortom två graders uppvärmning väntar ännu större effekter av klimatförändringarna. Vid en så kraftig temperaturökning sätter jorden själv igång processer som förvärrar uppvärmningen ännu mer, så kallade feedbackloops. En högre temperatur gör till exempel att det blir mer vattenånga i atmosfären, vilket förstärker uppvärmningen ytterligare eftersom vattenånga fungerar som en växthusgas.<br><br>
                  
                  Ökade utsläpp av metan från tinande permafrost och havsbottnar samt minskat upptag av koldioxid i haven kan trigga igång en skenande växthuseffekt, bortom mänsklig kontroll. För tillfället är vi på väg mot en värld som är minst tre grader varmare.<br><br>
                  
                  Tre till fyra graders uppvärmning skulle innebära en värld så förändrad från dagens verklighet att det skulle vara förödande för merparten av jordens ekosystem och kanske slutet för den mänskliga civilisationen.<br><br>
                  
                  </p>
                  <img src='./img/figuruppvarmning.png' alt='Global Uppvärmning'><br>");

        }  else {
            print("<p> Gå bort!</p>");
            
        }


            
            ?>
        </article>
    </section>
</body>
</html>
