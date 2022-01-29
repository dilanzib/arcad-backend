
    
<?php
            function updateFileTable($filename, $userID, $rubrik){
                
                $conn = create_conn();
                $stmt = $conn->prepare("INSERT INTO files (userID, filnamn, rubrik, likes, uploaded, dislikes) VALUES (?, ?, ?, 0, 0, 0)");
                $stmt->bind_param("iss", $userID, $filename, $rubrik);
                if ($stmt->execute()){
                    echo " Din fil har laddats upp! ";
                } else {
                    echo "Något går fel!";
                }

                $conn->close();
            }
    
           
   // Check if image file is a actual image or fake image
           if(isset($_POST["submit"])) {
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
               $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
               if($check !== false) {
                   echo "File is an image - " . $check["mime"] . ".";
                   $uploadOk = 1;
                   
               } else {
                   echo "File is not an image.";
                   $uploadOk = 0;
               }
   
           // Check if file already exists
           if (file_exists($target_file)) {
               $target_file = $target_file."2";
               echo "";
               $uploadOk = 1;
           }
           // Check file size
           if ($_FILES["fileToUpload"]["size"] > 500000000) {
               echo "Sorry, your file is too large.";
               $uploadOk = 0;
           }
           // Allow certain file formats
           if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
           && $imageFileType != "gif" ) {
               echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
               $uploadOk = 0;
           }
           // Check if $uploadOk is set to 0 by an error
           if ($uploadOk == 0) {
               echo "Sorry, your file was not uploaded.";
           // if everything is ok, try to upload file
           } else {
               if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                   echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

                   $filename = "../uploads/" . basename( $_FILES["fileToUpload"]["name"]) ;
                   $userID = test_input($_POST['id']);
                   $rubrik = test_input($_POST['title']);

                   updateFileTable($filename, $userID, $rubrik);
               } else {
                   echo "Sorry, there was an error uploading your file.";
               }
           }
        }     
?>
        </article>
       
    </section>
</body>
</html>