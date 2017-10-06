<!-- index.php ~ Homepage -->

<?php

session_start(); // Session Creation or Recovery

// require_once(""); // COMMENT

?>

<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>JoJoPhoto - Professional Photographer - Home</title>
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

            <!-- Slider "Carousel" -->

            <!-- Link to Gallery -->

        </div>

        <footer>
            <?php include_once("footer.php"); ?>
        </footer>

    </body>

</html>