<?php 
$conn = create_conn();  //koppla till DB

//Uppkoppling ok, hämta data!
$sql = "SELECT * FROM users"; 
$result = $conn->query($sql); //Kör en förfrågan på databsen, spara resultatet i en variabel ($results)


//Om resultatsobjekter ($results) innerhåller fler än 0 rader
if ($result->num_rows > 0) {
    // Skriv ut associerade värdet från varje rad
    while($row = $result->fetch_assoc()) {
        echo "<b>Användare: </b>" . $row["namn"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>