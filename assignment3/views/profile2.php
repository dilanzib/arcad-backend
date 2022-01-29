<?php include "../components/init.php"?>
<?php include "../components/head.php"?>
<?php include "../components/navbar.php"?>

<?php
if(isset($_SESSION['user'])){
    $anv = test_input($_SESSION['user']);
$conn = create_conn();//create connection

$stmt = $conn->prepare( "SELECT * FROM users WHERE namn = ?");
$stmt->bind_param("s", $anv);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
echo "anv: ". $row['namn']. " profil:<br>";
echo "epost: ".$row['epost']."<br>";
echo "anv id: ".$row['id']."<br>";

//hitta uploads
$userID = $row['id'];

$stmt = $conn->prepare( "SELECT * FROM files WHERE userID = ?");
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
$stmt = "SELECT users.namn, files.filnamn, files.id, files.rubrik, files.uploaded FROM users INNER JOIN files ON users.id = files.userID ORDER BY uploaded DESC";
$result = $conn -> query($stmt);



//echo "anv bild: <br> <img src='". $row['filnamn']. "'width = 50px><br>";


$conn->close();
    
   echo" <article>
    <h1>Ladda upp din fil hÃ¤r:</h1>
    <form action='../views/profile2.php' enctype='multipart/form-data' method='post'>
     Select image :
     <input type=text name='title'>
     <input type='hidden' name='userid' value='$userID'>
     <input type='file' name='fileToUpload' id='fileToUpload'><br/>
     <input type='submit' value='Ladda upp' name='submit'> <br/>
     <input type='submit' value='sort new' name='sortnew'> <br/>
     <input type='submit' value='sort old' name='sortold'> <br/>

     </form>
   
</article>";
  


include "../models/filupload.php";
$filupload = "../upload/";
$a = scandir($filupload);

$conn = create_conn();


if(isset($_POST['sortnew'])){
    $stmt = "SELECT users.namn, files.filnamn, files.id, files.rubrik, files.rating, files.uploaded FROM users INNER JOIN files ON users.id = files.userID ORDER BY uploaded DESC";
$result = $conn -> query($stmt);
while($row = $result->fetch_assoc()) {
    echo "<article class=post>";
echo "<h2>Rubrik: ".$row['rubrik']."</h2>";
echo "By: ".$row['namn']."<br>";
echo "<br> <img src='". $row['filnamn']. "'width = 250px><br>";
echo "Rating: ".$row['rating'];

    echo "<p> <a href='../views/profile2.php?like=$row[id]'>Gilla</a></p>";
    echo "<p> <a href='../views/profile2.php?dislike=$row[id]'>Gillar inte</a></p>";
    echo "<spann class='separator'></spann>";
echo "</article";
}
}


if(isset($_POST['sortold'])){
    $stmt = "SELECT users.namn, files.filnamn, files.id, files.rubrik, files.rating, files.uploaded FROM users INNER JOIN files ON users.id = files.userID ORDER BY uploaded ASC";
    $result = $conn -> query($stmt);
    while($row = $result->fetch_assoc()) {
        echo "<article class=post>";
    echo "<h2>Rubrik: ".$row['rubrik']."</h2>";
    echo "By: ".$row['namn']."<br>";
    echo "<br> <img src='". $row['filnamn']. "'width = 250px><br>";
    echo "Rating: ".$row['rating'];
    
        echo "<p> <a href='../views/profile2.php?like=$row[id]'>Gilla</a></p>";
        echo "<p> <a href='../views/profile2.php?dislike=$row[id]'>Gillar inte</a></p>";
        echo "<spann class='separator'></spann>";
    echo "</article";
    }
    }
    

    $stmt = "SELECT users.namn, files.filnamn, files.id, files.rubrik, files.rating, files.uploaded FROM users INNER JOIN files ON users.id = files.userID ORDER BY uploaded DESC";
    $result = $conn -> query($stmt);
while($row = $result->fetch_assoc()) {
    echo "<article class=post>";
echo "<h2>Rubrik: ".$row['rubrik']."</h2>";
echo "By: ".$row['namn']."<br>";
echo "<br> <img src='". $row['filnamn']. "'width = 250px><br>";
echo "Rating: ".$row['rating'];

    echo "<p> <a href='../views/profile2.php?like=$row[id]'>Gilla</a></p>";
    echo "<p> <a href='../views/profile2.php?dislike=$row[id]'>Gillar inte</a></p>";
    echo "<spann class='separator'></spann>";
echo "</article";
}


    if(isset($_GET["like"])) {
        $conn = create_conn();
        $cid = test_input($_GET['like']);
        $sql3 = "UPDATE files set rating = rating+1 where id = $cid";
        mysqli_query($conn, $sql3);
        header("Location: ../views/profile2.php");
        exit();
}
else echo"din like misslyckades";


    if(isset($_GET["dislike"])) {
        $conn = create_conn();
        $cid = test_input($_GET['dislike']);
        $sql3 = "UPDATE files set rating = rating-1 where id = $cid";
        mysqli_query($conn, $sql3);
        header("Location: ../views/profile2.php");
        exit();
}



}else {echo"<h1>du måste logga in</h1>";}



?>