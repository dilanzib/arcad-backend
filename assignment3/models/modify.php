<?php 
//vad ska editeras
$id = test_input($_GET['edit']);
//hämta annonsen 
$conn = create_conn();

$stmt = $conn->prepare("SELECT * FROM loppis WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result=$stmt->get_result();

while($row=$result->fetch_assoc()); {
   echo"<form action='../views/market.php' method='get'";
   echo"<input type='hidden' name='id' value='".$id."'";
   echo "Rubrik: <input type='text' name='rubrik' value=".$row['rubrik']."'>";
   echo "Beskrivning: <input type='text' name='rubrik' value=".$row['beskrivning']."'>";
   echo "Pris: <input type='text' name='rubrik' value=".$row['pris']."'>";
   echo"<input type='submit' value='Ändra'>"; 
   echo "</form>";
}

?>