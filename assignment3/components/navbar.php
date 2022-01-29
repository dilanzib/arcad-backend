  <body>
    <section>
        <nav class= "stroke" id="mainNav">
            <ul>
                <li><a href="../views/index.php">Hem</a></li>
                <li><a href="../views/search.php">Search</a></li>
                <li><a href="../views/autocomplete.php">Autocomplete</a></li>
                <li><a href="../views/rapport.php">Rapport</a></li>
                <?php if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin') {echo '<li><a href="../views/admin.php">Admin</a></li>';}?>
                
              <?php 
              if (isset($_SESSION['user'])) {
                echo "<li><a href='../views/profile.php?user='" . $_SESSION['user'] . "'>Profil</a></li>";
                echo "<li><a href='../views/comments.php'>Comments</a></li>";
                echo "<li><a href='../views/posts.php'>Posts</a></li>";
                echo "<li><a href='../views/index.php?logout=yes'> Logga ut</a></li>";
                echo "<p class='boxen'>User: " ."<b>". $_SESSION['user'] . "</b>";
                echo "<br>Roll:  " .  "<b>" . $_SESSION['role'] . "</b></p>";
                
              } else {
                echo "<li><a href='../views/login.php'>Logga in</a></li>";
              }
             ?>
                

      <?php 

      ?>
   
            </ul>
        </nav>







