<?php 
     $target_dir = "../uploads/";
     
     function updateFileTable($filename, $userID){
         print("Här ska vi mata in" . $filename . " i databasen för användaren " . $userID . "<br>");
        
         $conn = create_conn();
        $stmt = $conn->prepare("INSERT INTO file (userID, filnamn) VALUES (?,?)");
        $stmt->bind_param("is", $userID, $filename); 

        if($stmt->execute()) {
            print("Lagt till filen!");
            header("location:../views/profile.php");
        } 

        $conn->close();
    

    }

   // Check if image file is a actual image or fake image
           if(isset($_POST["submit"])) {

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
                   
                   updateFileTable($filename,$userID);
               } else {
                   echo "Sorry, there was an error uploading your file.";
               }
           }
        }     
?>
        </article>
       