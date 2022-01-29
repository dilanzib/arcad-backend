<?php include "../components/head.php" ?>
<?php include "../components/init.php" ?>
<?php include "../components/navbar.php" ?>


        <?php  
        if(isset($_GET['logout'])){
            //TODO: how to destroy session, that was saved bc on remembering who loggedin 
            session_unset();
            session_destroy();
            header("location:logout.php");

        }?>
        <article>
            <h2>Sidans användare</h2>
            <?php include "../models/users.php" ?>
        </article>   



    </section>
</body>
</html>
