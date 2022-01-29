<?php include "head.php" ?>
<?php include "init.php" ?>

<body>
    <section>
        <?php include "navbar.php" ?>
    
        <article>
            <h2>Logga in nedan: </h2>
            <form action="login.php" method="post" >
                 Användarnamn:<br> <input type="text" name="anv" required/><br>
                 Lösenord: <br><input type="password" name="psw" required/><br>
                 <input type="submit" value="Logga in" />   
            </form>
        </article>    

        <?php 
        if (isset($_POST['psw'])) {
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            $conn -> set_charset('utf-8');


            // Check connection
            if ($conn->connect_error)  {  die("Connection failed: " . $conn->connect_error); } 
             

            //Hämta data från GET/POST
            $anv = test_input($_POST['anv']);  //XSS protect
            $psw = test_input($_POST['psw']);
            $pswHash = hash('sha256', $psw);



            //prepared statement för att hindra SQL Injection
            $stmt = $conn->prepare("SELECT id,namn,losen,roll,epost,registered,visits,lastvisit FROM users WHERE namn = ?");  
            $stmt->bind_param("s", $anv);
            $stmt->execute();
            $result = $stmt-> get_result();  //spara resultatet i en variabel
            if($result->num_rows == 0 ) {
                echo "Användarnamnet finns ej! Försök igen!";
            } else {
                //while $row = $result->fetch_assoc() ifall många rader
                $row = $result->fetch_assoc(); //nu bara en rad 
                //echo $pswHash . "<br>" . $row['losen'];
                if($pswHash == $row['losen']) {
                    //echo "<br>Du har loggat in!";
                     $_SESSION['user']= $anv; 
                     $_SESSION['role'] = $row['roll'];
                     $_SESSION['regist'] = $row['registered'];
                     $_SESSION['lastvisit'] = $row['lastvisit'];
                     $_SESSION['visited'] = $row['visits'];

                     $id = $row['id'];
                     $visit = $row['visits'];
                     $visit = $visit+1;
                   
                    
             
                     $stmt = $conn->prepare("UPDATE users SET visits = ? WHERE id = ?");
                     $stmt->bind_param("ii", $visit, $id);

                     if ($stmt->execute()) {
                        echo "Din ".$visit." visit på sidan";
                    } else {
                        echo "Något fick fel";
                    }           
                    header("location:home.php");
                    }
                    
                    
                    
                    else {
                    echo "<br>Mata in ditt lösenord på nytt!";
                }
            }





            $conn->close();

        } 

        
        ?>
   



    </section>
</body>
</html>
