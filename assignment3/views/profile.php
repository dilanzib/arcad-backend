<?php include "../components/init.php"?>
<?php include "../components/head.php"?>
<?php include "../components/navbar.php"?>

<?php 

if (isset($_SESSION['user'])) { 
   // print("Hej på dig " . test_input($_SESSION['user']) . "!" );
    $anv = test_input($_SESSION['user']);
   
    $conn = create_conn();
    $stmt = $conn->prepare("SELECT * FROM users WHERE namn = ?");
    $stmt->bind_param("s", $anv);
    $stmt->execute();
    $result=$stmt->get_result();
    $row = $result->fetch_assoc();
    echo "<b>Namn: </b>" . $row['namn'] . "<br>";
    echo "<b>E-mail: </b> " . $row['epost'] . "<br>";
    echo "<b>Id: </b> " . $row['id'] . "<br>";

    $userID = $row['id'];
    $stmt = $conn->prepare("SELECT * FROM file WHERE userID = ? ORDER BY id DESC"); //quick fix för nyaste filen (ASC / DESC)
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result=$stmt->get_result();
    $rowe=$result->fetch_assoc(); 
    echo "<b> Profilbild:</b><br> <img src='" . $rowe['filnamn'] . "'><br>";


    $conn->close();
   
   
   
    print("
    <article>
    <h1> Här kan du byta profilbild</h1>
    <form action='profile.php' method='post' enctype='multipart/form-data'>
          Select image to upload:
          <input type='hidden' name='id' value='" . $userID . "'>
          <input type='file' name='fileToUpload' id='fileToUpload'>
          <input type='submit' value='Upload Image' name='submit'>
    </form>
    </article>     
    ");

    include "../models/filer.php";

} else {
    print("Du försöker se på nån annans profil!");
}

?>

    </section>
</body>
</html>
