
<?php 
$servername = "localhost";
$username = "zibaridi";
$password = "mymSWwJvpF";
$dbname = "zibaridi";

if (isset($_POST["losen"])) {
    $conn = new mysqli($servername, $username, $password, $dbname); 
    $conn -> set_charset('utf-8');

   
    if ($conn->connect_error)  {  die("Connection failed: " . $conn->connect_error); }   

    $anvandare = test_input($_POST["namn"]);
    $epost = test_input($_POST["epost"]);
    $losenord = test_input($_POST["losen"]); 
    $losenord = hash("sha256", $losenord);
    $roll = "user";
    $status = "unconfirmed";


    $statement = $conn->prepare("SELECT * FROM users WHERE namn = ?");
    $statement->bind_param("s", $anvandare);
    $statement->execute();
    $result = $statement->get_result();
    if ($result->num_rows > 0){
        echo "Användarnamnet finns redan!";
    } else {

    $statement = $conn->prepare("INSERT INTO users (namn, losen, epost, roll, status, visits) VALUES (?, ?, ?, ?, ?, 0)");
    $statement->bind_param("sssss", $anvandare, $losenord, $epost, $roll, $status);
 

    if ($statement-> execute()) {
        echo "Din registrering har lyckats!";
    } else {
        echo "NÃ¥got gick fel vid exekvering av sql kommandot!";
    }
    
    }
    $conn->close();
    
    
    
    

}

?>

</section>
</body>
</html>