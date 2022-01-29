<link rel= "stylesheet"
          type = "text/css"
          href = "style.css" />


    <nav class= "stroke" id="mainNav">
        <ul>
            <li><a href="./home.php">Hem</a></li>
            <li><a href="./2hand.php">Lopptorg</a></li>
            <li><a href="./search.php">Sök</a></li>
            <?php 
              if (isset($_SESSION['user'])) {
                echo "<li><a href='index.php?logout=yes'> Logga ut</a></li>";
                echo "<p class='boxen'>User: " ."<b>". $_SESSION['user'] . "</b>";
                echo "<br>Roll:  " .  "<b>" . $_SESSION['role'] . "</b></p>";
              } else {
                echo "<li><a href='login.php'>Logga in</a></li>";
              }
             ?>
        </ul>
    </nav>


<?php 

 if (isset($_SESSION['user'])) {
     echo "<p><b>Senaste besök: </b>". $_SESSION['lastvisit'] .  "<br>";
     echo "Din ".$_SESSION['visited']." visit på sidan<br>";
     echo "<b>Registrerad: </b> ". $_SESSION["regist"]. "</p>";
 }
?>

