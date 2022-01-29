<?php include "head.php" ?>
<?php include "init.php" ?>

<body>
    <section>
    <?php include "navbar2.php" ?>

   
        <article>
            <h2>Mata in data</h2> 
            <p>Sälj dina varor här! </p> 

            <form action="home.php" method="post" >
                 Rubrik:<br> <input type="text" name="rubrik" required/><br>
                 Beskrivning: <br><input type="text" name="beskrivning" required/><br>
                 Säljare: <br><input type="text" name="saljare" required/><br>
                 Pris: <br><input type="text" name="pris" required/><br>
                 <input type="submit" value="Mata in" required/>   
            </form>
            <?php include "insert.php"?>
        </article>   

        <article>
            <h2>Användarkonton</h2>
            <?php include "users2.php"?>
        </article>  

          


    </section>
</body>
</html>