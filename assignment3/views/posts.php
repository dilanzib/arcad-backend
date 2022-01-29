<?php include "../components/init.php"?>
<?php include "../components/head.php"?>
<?php include "../components/navbar.php"?>

<?php
if(isset($_SESSION['user'])){
    $anv = test_input($_SESSION['user']);
   
    $conn = create_conn();
    $stmt = $conn->prepare("SELECT * FROM users WHERE namn = ?");
    $stmt->bind_param("s", $anv);
    $stmt->execute();
    $result=$stmt->get_result();
    $row = $result->fetch_assoc();
    echo "<b> Användare: </b>" . $row['namn'];

    $userID = $row['id'];
    $stmt = $conn->prepare("SELECT * FROM files WHERE userID = ? ORDER BY id DESC");
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result=$stmt->get_result();
    $rowe=$result->fetch_assoc(); 


    $conn->close();
   
   
   
    print("
    <article>
    <h2> Ladda upp din bild : </h2>
    <form action='posts.php' method='post' enctype='multipart/form-data'>
          Välj en bild och skriv in din rubrik: <br>
          <input type=text name='title'>
          <input type='hidden' name='id' value='" . $userID . "'>
          <input type='file' name='fileToUpload' id='fileToUpload'>
          <input type='submit' value='Upload Image' name='submit'>

          <h2>Sortera enligt:  </h2> 
          <input type='submit' value='Nyaste' name='new'> 
          <input type='submit' value='Äldsta' name='old'> <br/>
      
    </form>
    </article>     
    ");
    include "../models/filupload.php";





   $conn = create_conn();

if(isset($_POST['old'])){
    $stmt = "SELECT users.namn, files.filnamn, files.id, files.rubrik, files.likes, files.uploaded, files.dislikes FROM users INNER JOIN files ON users.id = files.userID ORDER BY uploaded DESC";
    $result = $conn -> query($stmt);

    while($row = $result->fetch_assoc()) {
        echo "<article>";
        echo "<h3>" . $row['rubrik']. "</h3>";
        echo "Användare: ".$row['namn']."<br>";
        echo "<br> <img src='". $row['filnamn'] . "'width = 250px><br>";

        echo "<i> Likes </i> ".$row['likes'];
        echo "<i> Dislikes </i> ".$row['dislikes'];

        echo "<br><a href='posts.php?like=$row[id]'> Gilla </a>";
        echo "<a href='posts.php?dislike=$row[id]'> Ogilla </a>";
        echo "</article";
}
}

if(isset($_POST['new'])){
    $stmt = "SELECT users.namn, files.filnamn, files.id, files.rubrik, files.likes, files.uploaded, files.dislikes FROM users INNER JOIN files ON users.id = files.userID ORDER BY uploaded ASC";
    $result = $conn -> query($stmt);
    while($row = $result->fetch_assoc()) {
        echo "<article>";
        echo "<h3> ".$row['rubrik']."</h3>";
        echo "Användare: ".$row['namn']."<br>";
        echo "<br> <img src='". $row['filnamn'] . "'width = 250px><br>";

        echo "<i> Likes </i> ".$row['likes'];
        echo "<i> Dislikes </i> ".$row['dislikes'];

        echo "<br><a href='posts.php?like=$row[id]'> Gilla </a>";
        echo "<a href='posts.php?dislike=$row[id]'> Ogilla </a>";
        echo "</article";
    }
    }
    

    $stmt = "SELECT users.namn, files.filnamn, files.id, files.rubrik, files.likes, files.uploaded, files.dislikes FROM users INNER JOIN files ON users.id = files.userID ORDER BY uploaded DESC";
    $result = $conn -> query($stmt);
    
    while($row = $result->fetch_assoc()) {
    echo "<article>";
    echo "<h3> ".$row['rubrik']."</h3>";
    echo "Användare: ".$row['namn']."<br>";
    echo "<br> <img src='". $row['filnamn']. "'width = 250px><br>";
    
    echo "<i> Likes </i> ".$row['likes'];
    echo "<i> Dislikes </i> ".$row['dislikes'];

    echo "<br><a href='../views/posts.php?like=$row[id]'> Gilla </a>";
    echo " <a href='../views/posts.php?dislike=$row[id]'> Ogilla </a>";
    echo "</article";
}

if(isset($_GET["like"])) {
    $conn = create_conn();
    $id = test_input($_GET['like']);
    $sql = "UPDATE files set likes = likes+1 where id = $id";
    mysqli_query($conn, $sql);

    header("Location:posts.php");
    exit();
} 
else if (isset($_GET["dislike"])) {
    $conn = create_conn();
    $id = test_input($_GET['dislike']);
    $sql = "UPDATE files set dislikes = dislikes+1 where id = $id";
    mysqli_query($conn, $sql);

    header("Location: posts.php");
    exit();
}



} else  {
echo "Du har inte åtkomst till denna sida!";
}



?>


    </section>
</body>
</html>