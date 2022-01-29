<?php include "../components/head.php" ?>
<?php include "../components/init.php" ?>
<?php include "../components/navbar.php" ?>

    <?php 
        if (isset($_POST['psw'])) {
            $conn = create_conn();

            //Hämta data från GET/POST
            $anv = test_input($_POST['anv']);  //XSS protect
            $psw = test_input($_POST['psw']);
            $pswHash = hash('sha256', $psw);


            //prepared statement för att hindra SQL Injection
            $stmt = $conn->prepare("SELECT namn,losen,roll FROM users WHERE namn = ?");  
            $stmt->bind_param("s", $anv);
            $stmt->execute();
            $result = $stmt-> get_result();  //spara resultatet i en variabel
            if($result->num_rows == 0 ) {
                echo "Användarnamnet finns ej! Försök igen!";
            } else {
                //TODO: kolla att lösenordet är rätt
                //while $row = $result->fetch_assoc() ifall många rader
                $row = $result->fetch_assoc(); //nu bara en rad 
                //echo $pswHash . "<br>" . $row['losen'];
                if($pswHash == $row['losen']) {
                    //echo "<br>Du har loggat in!";
                     $_SESSION['user']= $anv; //så att vi förstår att SESSID 86693d5aa2fa776f988fd6139f2f41e7 = zibaridi
                     $_SESSION['role'] = $row['roll'];  //SESSID  86693d5aa2fa776f988fd6139f2f41e7 = editor
                     header("location:index.php");
                    } else {
                    echo "<br>Mata in ditt lösenord på nytt!";
                }
            }

            $conn->close();

        }  else if (isset($_GET['register']) || (isset($_POST['register']))){

           echo "<article>
            <h2>Registrera dig!</h2>
            <form action='login.php' method='post' > 
                 Användarnamn:<br> <input type='text' name='namn' required/><br>
                 Epost: <br><input type='text' name='epost' required/><br>
                 Lösenord: <br><input type='password' name='losen' required/><br>
                 <input type='submit' value='Registrera' name='register' required/>   
            </form>";
            include "../models/register.php";
        echo"</article>";


        } else {
         echo "    <article>
            <h2>Logga in nedan: </h2>
                <form action='login.php' method='post' >
                     Användarnamn:<br> <input type='text' name='anv' required/><br>
                     Lösenord: <br><input type='password' name='psw' required/><br>
                     <input type='submit' value='Logga in' name='login'/>   
                </form>
                <p>Ingen användare? Klicka <a href='login.php?register=yes'>HÄR </a> för att registrera dig!</p>
        </article>    ";
        }
        ?>
   



    </section>
</body>
</html>
