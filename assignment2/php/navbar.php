<link rel= "stylesheet"
  type = "text/css"
  href = "style.css" />


<nav class= "stroke" id="mainNav">
    <ul>
        <li><a href="./index.php">Hem</a></li>
        <li><a href="./rapport.php">Rapport</a></li>
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



