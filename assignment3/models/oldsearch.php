<?php include "../components/init.php" ?>
 
 <?php
    if (isset($_GET["query"])) {
     $conn = create_conn();
     $query = test_input($_GET['query']); 
     $query = "%".$query ."%"; 

     $stmt = $conn->prepare("SELECT * FROM loppis WHERE rubrik LIKE $query OR beskrivning LIKE $query");
     $stmt->bind_param("ss", $query, $query);
     $stmt->execute();

     $result=$stmt->get_result();
     while($row=$result->fetch_assoc()); {
        echo "<p class='post'>Rubrik: " . $row['rubrik']. "<br>";
        echo "Beskrivning " . $row['beskrivning']. "<br>";
        echo "Pris: " . $row['pris']. "<br>";
        echo "Säljare: " . $row['saljare']. "<br>";
        echo "<a href='../models/market.php?edit=".$row['id']."'>Editera</a></p>";
     }
         
    } else { 
        $conn = create_conn();
        $sql = "SELECT * FROM loppis ORDER BY rubrik ASC";

        $result = $conn->query($sql);
        if($result->num_rows>0) {
             while($row = $result->fetch_assoc()){
                 echo "<p class='post'>Rubrik: " . $row['rubrik']. "<br>";
                 echo "Beskrivning " . $row['beskrivning']. "<br>";
                 echo "Pris: " . $row['pris']. "<br>";
                 echo "Säljare: " . $row['saljare']. "<br>";
                 echo "<a href='../views/market.php?edit=".$row['id']."'>Editera</a></p>";
    }
    
    } else {
            echo "Inga annonser hittades!";
           }
    }
         
    

?>
