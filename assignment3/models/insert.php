<?php
//Kolla om man har fyllt i tabellen

if (isset($_GET["name"])) {
    $conn = create_conn();

    //Input validation skyddar för XSS 
    $name = test_input($_GET["name"]);
    $comment = test_input($_GET["comment"]);


    //  --------   ENDAST FÖR FELSÖKNING     --------- //
    /*
    $sql = "INSERT INTO loppis (rubrik, beskrivning, saljare, pris) 
    VALUES ('" . $rubrik . "', '" . $beskrivning . "', '" . $saljare . "', '" . $pris . "')";
    print($sql);
    $result = $conn->query($sql); 
    */
    //  --------   ENDAST FÖR FELSÖKNING     --------- //



    // prepared statements för att skydda emot SQL injektion
    $statement = $conn->prepare("INSERT INTO blog (name, comment) VALUES (?, ?)");
    $statement->bind_param("ss", $name, $comment);


    //Execute return true on sucess, and false on failure
    if ($statement-> execute()) {
        echo "Din kommentar har lagts upp!";
        header("location:../views/comments.php");
    } else {
        echo "Något gick fel vid exekvering av sql kommandot!";
        header("location:../views/comments.php");
    }

    $conn->close();
}
?>