<?php 

if(isset($_SESSION["role"]) && ($_SESSION["role"] == "admin" )) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn -> set_charset('utf-8');
if ($conn->connect_error)  {  die("Connection failed: " . $conn->connect_error); }


$sql = "SELECT * FROM users"; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) {

    echo "<table><tr><th>ID</th><th>Namn</th><th>Lösenord</th><th>E-post</th><th>Roll</th><th>Status</th>";

    while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["id"] ."</td><td>". $row["namn"]. "</td><td> " . $row["losen"].
              "</td><td> " . $row["epost"]. "</td><td> " . $row["roll"]. "</td><td> " . $row["status"].  "</td><td><a href=\"deleteusers.php?id=".$row['id']. "
              \" onClick=\"return confirm('Är du säker på att du vill ändra på användarens uppgifter')\"
              > Radera </a></td>";
          
        echo 
             "<td><a href=\"editusers.php?id=".$row['id']. "
             \" onClick=\"return confirm('Är du säker på att du vill ändra på användarens uppgifter?')\"
             > Edit </a> </td></td></tr>";
            
    }
} else {
    echo "Inga resultat";
}
} else {
    $conn = new mysqli($servername, $username, $password, $dbname);
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
    
}
$conn->close();
?>