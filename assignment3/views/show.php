<?php include "../components/init.php" ?> 
<?php include "../components/head.php" ?>
<?php include "../components/navbar.php" ?>
<?php

    if(isset($_GET['user'])){
    $userpippeli = $_GET['user'];
    $conn = create_conn();
    $stmt = $conn->prepare( "SELECT * FROM users WHERE namn = ?");
    $stmt->bind_param("s", $userpippeli);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    echo "<div style=text-align:center;>";
    echo" <h2> Användare </h2>";
    echo "Användare: ". $row['namn']. " profil:<br>";
    echo "E-post: ".$row['epost']."<br>";
    echo "Registrerad: ".$row['registered']."<br>";


    $userID = $row['id'];
    $stmt = $conn->prepare( "SELECT * FROM files WHERE userID = ?");
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
    echo "<div style=text-align:center;>";
    echo "<h2> Profilbild: </h2>";
    echo "<br> <img src='". $row['filnamn']. "'width = 50%><br>";
    echo "</div>";
 
}
}
$conn->close();

?>
</section>

</body>

</html>