<?php include "head.php" ?>
<?php include "init.php" ?>

<body>
    <section>
        <?php include "navbar.php" ?>

        <?php  
        if(isset($_GET['logout'])){
            //TODO: how to destroy session, that was saved bc on remembering who loggedin 
            session_unset();
            session_destroy();
            header("location:logout.php");

        }?>

        <article>
            <h2>Aktiva Användaren</h2>
            <?php include "users.php"?>
        </article>  

        

        <article>
            <h2>Registrera dig!</h2>

            <form action="index.php" method="post" >  
                 Användarnamn:<br> <input type="text" name="namn" required/><br>
                 Epost: <br><input type="text" name="epost" required/><br>
                 Lösenord: <br><input type="password" name="losen" required/><br>
                 <input type="submit" value="Registrera" required/>   
            </form>
            <?php include "register.php"?>
        </article>   


    </section>
</body>
</html>
