<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <title>Projekt 3</title>
    <link rel="stylesheet" href="../resources/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <section>
        <nav class= "stroke" id="mainNav">
            <ul>
                <li><a href="../views/index.php">Hem</a></li>
                <li><a href="../views/search.php">Comments</a></li>
                <li><a href="../views/ajax.php">Ajax</a></li>
                <li><a href="../views/autocomplete.php">Autocomplete</a></li>
                <li><a href="../views/rapport.php">Rapport</a> </li>
                <?php if (isset($_SESSION['user']) && $_SESSION['role'] == 'admin') {echo '<li><a href="../views/admin.php">Admin</a></li>';}?>
                
             <?php 
              if (isset($_SESSION['user'])) {
                echo "<li><a href='../views/files.php?user='" . $_SESSION['user'] . "'>Profil</a></li>";
                echo "<li><a href='../views/index.php?logout=yes'> Logga ut</a></li>";
                echo "<p class='boxen'>User: " ."<b>". $_SESSION['user'] . "</b>";
                echo "<br>Roll:  " .  "<b>" . $_SESSION['role'] . "</b></p>";
                
              } else {
                echo "<li><a href='../views/login.php'>Logga in</a></li>";
              }
             ?>
                
            </ul>
       </nav>

     <div class = "container" style="margin-top: 50px;">    

        <div class="row" style="margin-top: 28px;margin-bottom: 20px;">
            <div class="col-md-12">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/eD02QLsTUnY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>  
        </div>       

        <div class="row">
            <div class="col-md-12">
                 <textarea class="form-control" id="mainComment" placeholder="Add comment" cols="30" rows="2"></textarea>
                 <button style="float:right" class="btn-primary btn" id="addComment"> Add comment </button>
            </div> 
        </div>       

        <div class="row">
            <div class="col-md-12">
                 <div class="comment">
                    <div class="user">Senaid B <span class="time"> 20.07.2020</span></div> 
                    <div class="userComment">this is my comment</div>
                    <div class="replies"></div>
                 </div>
            </div>  
        </div>       
     </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script type="text/javascript">

    $(document).ready(function ()){
        $('#addcomment').on('click', function ()) {
            var comment = $('#mainComment').val();
            
            if(comment.length > 5){
                $.ajax ({
                    url: 'reply.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        addComment: 1,
                        comment: comment
                    }, success: function (response) {
                        console.log(response);
                    }
                })
            }
        }
    }

<?php 
include "../components/init.php";

if (isset($_POST['addComment'])) {
    $comment = $conn->real_escape_string($_POST['comment']);
    $conn->query("INSERT INTO comments (userID, comment, created)  VALUES ('". $_SESSION['userID'] ."' , '$comment', NOW()");
    exit('success');
}

?>
    </section>
</body>


