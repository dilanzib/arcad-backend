<?php include "../components/head.php" ?>
<?php include "../components/init.php" ?>
<?php include "../components/navbar.php" ?>

<article>
        <h2>Kommentera</h2>
        <p>Skriv din kommentar här:</p>
        <form action="comments.php" method="get">
            Namn:<br><input type="text" name="name" required /><br>
            Kommentar:<br><textarea name="comment" required></textarea><br>
            <input type="submit" value="Lägg till" />
        </form>
        <?php include "../models/insert.php" ?> 
    </article>  

    <article>
        <h2>Inläggen</h2>
    </article>    

<!-- Kommentarerna -->
    <?php 

    $conn = create_conn();

    $sql = "SELECT * FROM blog ORDER BY id DESC";
    $result = $conn->query($sql); 


    if ($result->num_rows > 0){ 
    
    while ($results = $result->fetch_assoc())
    { 
        echo  "<b><i> ". $results["name"] . " </i></b>" . $results["date"] . "<br>" ; 
        echo  "<b> Kommentar: </b> " . $results["comment"] ."<br><br>";

    }
    
    }
    else{ 
        echo "Inga resultat"; 
    }


    ?>
        