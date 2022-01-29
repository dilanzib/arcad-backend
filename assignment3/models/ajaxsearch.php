<?php 
include "../components/init.php";

$conn = create_conn();  

//kolla ifall vi fick vår query som get data
$query = $_GET['query'];
echo "Du sökte på strängen: " . $query . "<br> <br>";
$query = "%" .$query. "%";

$stmt = $conn->prepare("SELECT * FROM users WHERE namn LIKE ?");
$stmt->bind_param("s",$query);
$stmt->execute();

$result = $stmt->get_result();


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $name = $row['namn'];
        echo"<br><a href='../views/show.php?user=".$name."'>$name</a><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
