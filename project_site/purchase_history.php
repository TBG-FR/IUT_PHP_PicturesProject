<?php

    require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start + Disconnection Management    

?>

<!-- 'p_history.php' ~ Purchases History & Informations -->

<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>Andrew Blind - Professional Photographer - Login/Register</title>
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
            
            /* ===== ===== ===== IF USER IS CONNECTED => DISPLAY USEFUL LINKS ===== ===== ===== */ 
            if( $_SESSION['user'] instanceof User && $_SESSION['user']->getStatus() == TRUE ) {

                echo "
                
                    <div id='_'>

                    </div>

                "; /* Echo[HTML] : End */

            }
            
            /* ===== ===== ===== ELSE (NOT CONNECTED) => _____ ===== ===== ===== */
            else {
                
                echo "
                
                    <div id='_'>

                    </div>

                "; /* Echo[HTML] : End */

            }

            ?>

        </div>

        <footer>
            <?php include_once("footer.php"); ?>
        </footer>

    </body>

</html>