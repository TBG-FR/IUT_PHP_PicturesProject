<?php

    require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start + Disconnection Management

    // IF the user isn't logged, send him to the 404 page, unless he just disconnected himself
    if ($_GET) {if ($_GET['action'] == 'disconnect' || $_GET['action'] == 'disconnected' ) { header("Location: index.php?action=disconnected"); }}
    else if ( $_SESSION['user'] instanceof User == FALSE) { header("Location: 404.php"); }
    else if ( $_SESSION['user']->getID() != 2 ) { header("Location: 404.php"); }

?>

<!-- 'upload_picture.php' ~ Second page for adding a new Picture -->

<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>Andrew Blind - Professional Photographer - Uploading Picture</title>
        <!-- <meta name="description" content=""> -->
        <!-- <meta name="author" content=""> -->

        <?php include_once("head.php"); // Make all the CSS & JavaScript links ?>

    </head>

    <body>

        <header>
            <?php include_once("header.php"); ?>
            <?php include_once("navbar.php"); ?>
        </header>

        <div class="content">

            <p class='title'>Edit your new Picture's informations here</p><br />

            <?php

            // Creation of an "Empty" Picture
            $pic= new Picture(-1,"","","",0,"",0);
            
            // IF THE FILES ALREADY EXIST => SEND BACK THE USER
            if(file_exists ("private_images/".$_FILES['pic']['name'])){
                $_SESSION['error']='alreadyexist';
                echo "<script type='text/javascript'>document.location.replace('add_picture.php');</script>";
            }

            // Generation of the "Editing" form
            if($pic->addImage($_FILES['pic']['name'],$_FILES['pic']['error'],$_FILES['pic']['tmp_name'])) {

                $img="private_images/{$_FILES['pic']['name']}";
                $filename = $_FILES['pic']['name'];

                echo "<img src='$img' alt='' height='150px' >";

                echo "
                    <form class='text' action='save_pic_db.php' method='post'><br/>
                        Filename : <br/><input type='text' name='pic_name' placeholder='$filename' value='$filename' readonly ><br/>
                        Title : <br/><input type='text' name='pic_title' value='$filename' ><br/>
                        Description : <br/><input type='text' name='pic_desc' placeholder='Describe your picture here' ><br/>
                        Date (DD/MM/YYYY) : <br/><input type='text' name='pic_date'><br/>
                        Keywords (comma separated) : <br/><input type='text' name='pic_keywords'><br/>
                        
                        Watermark Color :<br/>        
                        <select name='wtmk_color' size='2'>
                            <option value='white' selected>White</option>
                            <option value='black'>Black</option>
                        </select><br/>

                        <input type='submit' value='Envoyer' >
                    </form>";
            }

            ?>

        </div>

        <footer>
            <?php include_once("footer.php"); ?>
        </footer>

    </body>

</html>