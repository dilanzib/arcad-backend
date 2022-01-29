<?php include "init.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <header>
        <?php include "navbar.php" ?>
    </header>

    <section>

        <article>
            <h2>Uppladdade filer</h2>
            
        </article>

    

        <article>

            <?php
    
          
			$myDirectory = opendir("uploads");

			
			while($entryName = readdir($myDirectory)) {
				$dirArray[] = $entryName;
			}

	
			closedir($myDirectory);

			$indexCount	= count($dirArray);

			?>

			<ul>

				<?php
				for($index=0; $index < $indexCount; $index++) {
					$extension = substr($dirArray[$index], -3);
					if ($extension == 'JPG' || $extension == 'jpg' || $extension == 'pdf' || $extension == 'png' || $extension == 'jpeg'){ 
						echo '<img src="uploads/' . $dirArray[$index] . '" alt="Image" /><br>';
					}	
				}
        
            ?>
        </article>
    </section>
</body>
</html>