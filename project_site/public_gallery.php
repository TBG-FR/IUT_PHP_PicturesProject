<?php

    require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start + Disconnection Management    

?>

<!-- 'gallery.php' ~ Displays the public gallery (without login, and with watermarked pictures) -->

<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>Andrew Blind - Professional Photographer - Gallery</title>
        <!-- <meta name="description" content=""> -->
        <!-- <meta name="author" content=""> -->

        <!-- CSS : Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="all" type="text/css">

        <!-- CSS : Custom -->
        <link href="css/style.css" rel="stylesheet" media="all" type="text/css">

        <!-- Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </head>

    <body>

        <header>
            <?php include_once("header.php"); ?>
            <?php include_once("navbar.php"); ?>
        </header>

        <div class="content">

            <!-- "Selection" Buttons -->

            <!-- Images (Gallery) -->
            <img src="public_images/observation_deck___wallpaper_by_z_design-d2q7jic.jpg" alt="" title="" height="200px">
            <img src="public_images/observation_deck___wallpaper_by_z_design-d2q7jic.jpg" alt="" title="" height="200px">
            <img src="public_images/observation_deck___wallpaper_by_z_design-d2q7jic.jpg" alt="" title="" height="200px">
            <img src="public_images/observation_deck___wallpaper_by_z_design-d2q7jic.jpg" alt="" title="" height="200px"> <br />
            <img src="public_images/observation_deck___wallpaper_by_z_design-d2q7jic.jpg" alt="" title="" height="200px">
            <img src="public_images/observation_deck___wallpaper_by_z_design-d2q7jic.jpg" alt="" title="" height="200px">
            <img src="public_images/observation_deck___wallpaper_by_z_design-d2q7jic.jpg" alt="" title="" height="200px">
            <img src="public_images/observation_deck___wallpaper_by_z_design-d2q7jic.jpg" alt="" title="" height="200px"> <br />
            <img src="public_images/observation_deck___wallpaper_by_z_design-d2q7jic.jpg" alt="" title="" height="200px">
            <img src="public_images/observation_deck___wallpaper_by_z_design-d2q7jic.jpg" alt="" title="" height="200px">
            <img src="public_images/observation_deck___wallpaper_by_z_design-d2q7jic.jpg" alt="" title="" height="200px">
            <img src="public_images/observation_deck___wallpaper_by_z_design-d2q7jic.jpg" alt="" title="" height="200px">

        </div>

        <footer>
            <?php include_once("footer.php"); ?>
        </footer>

    </body>

</html>