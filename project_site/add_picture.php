<?php

    require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start + Disconnection Management

    // IF the user isn't logged, send him to the 404 page, unless he just disconnected himself
    if ($_GET) {if ($_GET['action'] == 'disconnect' || $_GET['action'] == 'disconnected' ) { header("Location: index.php?action=disconnected"); }}
    else if ( $_SESSION['user'] instanceof User == FALSE) { header("Location: 404.php"); }
    else if ( $_SESSION['user']->getID() != 2 ) { header("Location: 404.php"); }

?>

<!-- 'add_picture.php' ~ First page for adding a new Picture -->

<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>Andrew Blind - Professional Photographer - Add a Picture</title>
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

            <p class='title'>Adding a new Picture</p><br />
            
            <form class='text' action="upload_image.php" enctype="multipart/form-data"  method="post">
                <input type="file" name="pic" required >
                <input type="submit" value="Envoyer" >
            </form>

            <br/>
            
            <?php            
            // Display an error if the user has been sent back here after trying to upload an image already existing
            if(isset($_SESSION['error'])){
                echo "<div class='notification alert alert-danger' role='alert'>Error : Filename already taken ! Please try again.</div>";
                unset($_SESSION['error']);
            }
            ?>

        </div>

        <footer>
            <?php include_once("footer.php"); ?>
        </footer>

    </body>

</html>