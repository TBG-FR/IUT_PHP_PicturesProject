<?php

    require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start + Disconnection Management    

?>

<!-- 'private_gallery.php' ~ Displays the personal gallery (login required, purchased pictures without watermarks) -->

<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>Andrew Blind - Professional Photographer - <?php echo $_SESSION['private_gal']->getTitle(); ?></title>
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
            
            //if $_SESSION['user']->getID() == 2

            <div class="edit_page">
             CONTENT
            </div>
            
            
            //else

            <div class="gallery">

                <?php

                foreach($_SESSION['private_gal']->getPictures() as $picture) {
                    
                    //if($picture->getState()==2) {
                        
                            echo "
                                <div class=\"gal_element\"> 

                                    <img src='private_images/".$picture->getPath()."' alt='' />

                                    <div class=\"gal_overlay\">
                                        <div class=\"gal_buttons\">
                                            <a href='##view_details'    class='btn btn-default' role='button'>View More</a>
                                        </div>
                                    </div>

                                </div>
                            ";
                    //}
                }

                ?>

            </div>
        </div>

        <footer>
            <?php include_once("footer.php"); ?>
        </footer>

    </body>

</html>