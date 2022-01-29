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
            <h2>Uppgift 4</h2>
            <h1>Registrera dig! </h1>
            <form action="epost.php" method="post">
                Användarnamn: <input type="text" name="user" required><br>
                E-postadress: <input type="text" name="epost" required><br>
                <input type="submit" name="skicka" value="Skicka">
            </form>
        </article>

        <article>

            <?php
            //hur checkar man om nån ha fyllt i eller int?
            if(isset($_POST["epost"])){

            $epost = test_input($_POST["epost"]);
            $user = test_input($_POST["user"]);

            $email  = $_POST['epost'];
            $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

            if (filter_var($emailB, FILTER_VALIDATE_EMAIL) === false ||
                $emailB != $email
            ) {
                echo "Mata in din email adress på nytt!";
                exit(0);
            }

            print("<br> Välkommen " .$user. " med e-posten " .$epost. "!");

            //Skapar lösenord
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
            $password = substr(str_shuffle($chars), 0, 8);

            //Skapar välkkomsmail 
            $subject = "Välkommen till Dilans sida!\n";
            $message = 'Välkommen ' . $user . "\n\n" . ''
            . 'Dina uppgifter är följande : ' . "\n" . ''
            . 'Email: ' . $epost . "\n". ''
            . 'Ditt nya lösenord är: ' . $password . "\n\n" . ''
            . 'Nu kan du logga in med ditt nya lösenord!';
        
            
            //Skickar eposten
            mail($epost, $subject, $message);
            }
            else {
                print("Fyll i formuläret!");
            }



            ?>
        </article>
    </section>
</body>
</html>
