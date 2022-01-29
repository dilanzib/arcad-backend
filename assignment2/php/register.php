<?php
//Kolla om man har fyllt i tabellen

if (isset($_POST["losen"])) {
    $conn = new mysqli($servername, $username, $password, $dbname); //create connection
    $conn -> set_charset('utf-8');

   
    if ($conn->connect_error)  {  die("Connection failed: " . $conn->connect_error); }   //CHECK connection

    //Input validation skyddar för XSS 
    $anvandare = test_input($_POST["namn"]);
    $epost = test_input($_POST["epost"]);
    $losenord = test_input($_POST["losen"]); //LÖSENORD I PLAIN TEXT? ändra till hash
    $losenord = hash("sha256", $losenord);
    $roll = "user";
    $status = "unconfirmed";

    //TODO: checka om användaren redan finns
    $statement = $conn->prepare("SELECT * FROM users WHERE namn = ?");
    $statement->bind_param("s", $anvandare);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows > 0){
        echo "Användarnamnet finns redan!";
    } else {
            // prepared statements för att skydda emot SQL injektion
    $statement = $conn->prepare("INSERT INTO users (namn, losen, epost, roll, status, visits) VALUES (?, ?, ?, ?, ?, 0)");
    $statement->bind_param("sssss", $anvandare, $losenord, $epost, $roll, $status);
 
    //Execute return true on sucess, and false on failure
    if ($statement-> execute()) {
        echo "Din registrering har lyckats!";
    } else {
        echo "Något gick fel vid exekvering av sql kommandot!";
    }
    
    }
    $conn->close();
    
    
    

}
?>