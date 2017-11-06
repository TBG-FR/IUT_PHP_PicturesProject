<?php

require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start + Disconnection Management    

?>

<!-- 'index.php' ~ Homepage -->

<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>Andrew Blind - Professional Photographer - Page not found</title>
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

            <h1>Error 404 - Page not found</h1>
            <h3>
                Looks like this page doesn't exist... <br/>
                Maybe you need to be logged to see it ?
            </h3>
            
            <img class='large_image' src='img/404.jpg' alt='Abandoned Place : Old Control Room (404 Page Picture)' />

            <br /><br /><a href='index.php' class='btn btn-primary' role='button'><h4>Back to the Homepage</h4></a>

        </div>

        <footer>
            <?php include_once("footer.php"); ?>
        </footer>

    </body>

</html>