<?php

    require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start + Disconnection Management 

    // IF the user isn't logged, send him to the 404 page, unless he just disconnected himself
    if ($_GET) {if ($_GET['action'] == 'disconnect' || $_GET['action'] == 'disconnected' ) { header("Location: index.php?action=disconnected"); }}
    else if ( $_SESSION['user'] instanceof User == FALSE) { header("Location: 404.php"); }
    else if ( $_SESSION['user']->getID() != 2 ) { header("Location: 404.php"); }

?>

<!-- 'management.php' ~ Website Management (Pictures) -->

<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>Andrew Blind - Professional Photographer - Website Management</title>
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

            <?php
                echo "                
                    <div class='large_menu'>
                        <!-- Management - Title -->
                        <p class='title'>Website Management</p><br />

                        <!-- Management - Links -->
                        <a href='add_picture.php' class='btn btn-primary btn-block btntext' role='button'>Add a Picture</a>
                        <a href='private_gallery.php' class='btn btn-primary btn-block btntext' role='button'>Manage Pictures</a>
                        <a href='#NOT_YET_IMPLEMENTED' class='btn btn-warning btn-block btntext' role='button'>Manage Keywords</a>
                        <a href='#NOT_YET_IMPLEMENTED' class='btn btn-warning btn-block btntext' role='button'>Display Statistics</a>
                        <a href='?action=disconnect' class='btn btn-danger btn-block btntext' role='button'>Log out</a>
                    </div>
                    
                "; /* Echo[HTML] : End */

            ?>

        </div>

        <footer>
            <?php include_once("footer.php"); ?>
        </footer>

    </body>

</html>