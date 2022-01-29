
<?php
echo "<article>";
echo "<h1>ADMINSIDAN</h1>";
include "init.php";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, rubrik, beskrivning, saljare, pris, datum FROM loppis";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Rubrik</th><th>Beskrivning</th><th>SÃ¤ljare</th><th>Pris</th><th>DELETE</th</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["rubrik"] ."</td><td>". $row["beskrivning"]. "</td><td> " . $row["saljare"].
          " </td><td> " . $row["pris"]."</td>"."<td><a href=\"delete.php?id=".$row['id']."\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"."</td> </tr>";
        
    }
    
} else {
    echo "0 results";
}
echo "</article";
echo "<article>";
$sql = "SELECT * FROM users";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>id</th><th>Namn</th><th>losen</th><th>epost</th><th>DELETE</th</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] ."</td><td>". $row["namn"]. "</td><td> " . $row["losen"].
          " </td><td> " . $row["epost"]."</td>"."<td><a href=\"delete.php?id=".$row['id']."\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"."</td> </tr>";
          
    }
    
} else {
    echo "0 results";
}
echo "</article";


?>