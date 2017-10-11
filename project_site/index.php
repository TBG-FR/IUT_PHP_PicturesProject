<?php

session_start(); // Session Creation or Recovery

// require_once(""); // COMMENT

?>

<!-- index.php ~ Homepage -->

<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>Andrew Blind - Professional Photographer - Home</title>
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

             <!-- Short Description -->
            <p class="short_text">
                I'm Andrew Blind, a professional photographer since 2012, located in the USA. <br />
                Welcome to my Website, where you can have a look at my pictures, and even buy them if you like them and want to support my work ! <br />
                Don't hesitate to contact me for any questions or inquiries ~ <br />
            </p>

            <!-- Carousel / Slider -->
            <div class="Carousel_container">
            <img src="public_images/observation_deck___wallpaper_by_z_design-d2q7jic.jpg" alt="" title="" height="250px"></div>

            <!-- Link to Gallery -->
            <h3><a href="gallery.php">See/Buy all my Pictures</a></h3>

        </div>

        <footer>
            <?php include_once("footer.php"); ?>
        </footer>

    </body>

</html>