<?php
//Kolla om man har fyllt i tabellen

if (isset($_POST["pris"])) {
        // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn -> set_charset('utf-8');

    // Check connection
    if ($conn->connect_error)  {  die("Connection failed: " . $conn->connect_error); } 

    //Input validation skyddar för XSS 
    $rubrik = test_input($_POST["rubrik"]);
    $beskrivning = test_input($_POST["beskrivning"]);
    $saljare = test_input($_POST["saljare"]);
    $pris = test_input($_POST["pris"]);



    //  --------   ENDAST FÖR FELSÖKNING     --------- //
    /*
    $sql = "INSERT INTO loppis (rubrik, beskrivning, saljare, pris) 
    VALUES ('" . $rubrik . "', '" . $beskrivning . "', '" . $saljare . "', '" . $pris . "')";
    print($sql);
    $result = $conn->query($sql); 
    */
    //  --------   ENDAST FÖR FELSÖKNING     --------- //


    // INSERT INFO 'loppis' ('id', 'rubrik', 'beskrivning', 'saljare' , 'pris' , 'datum');
    //VALUES (NULL, 'En ny bil', 'Vackerbil, mammas bmw', 'skurk', '1000', 'current_timestamp);'


    // prepared statements för att skydda emot SQL injektion
    $statement = $conn->prepare("INSERT INTO loppis (rubrik, beskrivning, saljare, pris) VALUES (?, ?, ?, ?)");
    $statement->bind_param("sssi", $rubrik, $beskrivning, $saljare, $pris);


    //Execute return true on sucess, and false on failure
    if ($statement-> execute()) {
        echo "Din annons har lagts upp!";
    } else {
        echo "Något gick fel vid exekvering av sql kommandot!";
    }


    $conn->close();
    $statement->close();
}
?>