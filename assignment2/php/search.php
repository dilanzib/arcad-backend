<?php include "head.php" ?>
<?php include "init.php" ?>

<body>
    <section>
    <?php include "navbar2.php" ?>

   
        <article>
            <h2>Sök inlägg i lopptorget</h2> 
            <form  method="post" action="search.php"> 
	            <input  type="text" name="sok"> 
	            <input  type="submit" name="submit" value="Sök"> 
           </form> 
        
        </article>   

        <?php
    if (isset($_POST["sok"])) {
     $conn = new mysqli($servername, $username, $password, $dbname); //create connection
     $conn -> set_charset('utf-8');
   
     if ($conn->connect_error)  {  die("Connection failed: " . $conn->connect_error); }   // Check connection
     else { echo " "; }

     $query = test_input($_POST["sok"]); // skyddar för XSS 
     $min_length = 2;   //min längd av sökningen
     
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
         
        $sql = "SELECT * FROM loppis
            WHERE `rubrik` LIKE '%".$query."%' OR `beskrivning` LIKE '%".$query."%' OR `saljare` LIKE '%".$query."%' OR `pris` LIKE '%".$query."%'";
        $result = $conn->query($sql); //Kör en förfrågan på databsen, spara resultatet i en variabel ($results)

         
        if ($result->num_rows > 0){ 
             
            while ($results = $result->fetch_assoc())
            { 
                echo "<p><h3>- ".$results['rubrik']."</h3> Beskrivning: ".$results['beskrivning'] . "<br> Pris: ".  $results['pris'] . "€ <br>" . "Säljare: ".$results['saljare']. "</p>";     
            }
             
        }
        else{ 
            echo "Inga resultat";  //om de int finns någo matchningar
        }
         
    }
    else{
        echo "Minimum längden är ".$min_length;  //om sökningen är mindre än min längden
    }
}

?>


    </section>
</body>
</html>