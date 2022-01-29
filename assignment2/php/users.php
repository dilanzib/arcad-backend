<?php 
$conn = new mysqli($servername, $username, $password, $dbname);
$conn -> set_charset('utf-8');
if ($conn->connect_error)  {  die("Connection failed: " . $conn->connect_error); }


$sql = "SELECT * FROM users"; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "<b>Användare: </b>" . $row["namn"] . "<br>";
    }
} else {
    echo "Inga resultat";
}
$conn->close();
?>