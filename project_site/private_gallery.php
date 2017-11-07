<?php

    require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start + Disconnection Management

    // IF the user isn't logged, send him to the 404 page, unless he just disconnected himself
    if ($_GET['action'] == 'disconnect' ) { header("Location: index.php?action=disconnected"); }
    else if ( $_SESSION['user'] instanceof User == FALSE) { header("Location: 404.php"); }

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
          
            <?php
            
            // IF THE USER IS THE ADMIN => DISPLAY ADMIN EDIT PAGE
            if( $_SESSION['user'] instanceof User && $_SESSION['user']->getID() == 2 ) {
                
                echo "<p class='title'>Edit or Delete Pictures</p><br />";

            /*<div class="edit_page">
                <table>
            <?php 
                foreach($_SESSION['private_gal']->getPictures() as $picture) {
                    
                echo "<tr> <td> <img src='private_images/".$picture->getPath()."' alt='' height=100 /> </td> <td> {$picture->getName()} </td> {$picture->getDesc()} <td> {$picture->getDate()} </td>
                 
                 <td>
                 <a href='?action=edit&id={$picture->getId()}'    class='btn btn-default' role='button'> Edit </a>
                 </td>
                 <td>
                 <a href='?action=delete&id={$picture->getId()}'  class='btn btn-default' role='button'> Delete </a>
                 </td>
                
                
                </tr> ";*/
                
                echo "<div class='edit_page'><br>
                        <table>";
                
                echo "
                    <tr>
                        <th>Picture</th>
                        <th>Picture Title</th>
                        <th>Picture Description</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                        ";
                
                foreach($_SESSION['private_gal']->getPictures() as $picture) {
                    
                    echo "
                        <tr>
                            <td><img src='private_images/".$picture->getPath()."' alt='".$picture->getTitle()."' height='100px' /></td> 
                            <td>{$picture->getName()}</td>
                            <td>{$picture->getDesc()}</td>
                            <td>{$picture->getDate()}</td>
                            <td><a href='?action=edit&id={$picture->getId()}' class='btn btn-default' role='button'>Edit</a></td>                        
                            <td><a href='?action=delete&id={$picture->getId()}' class='btn btn-default' role='button'>Delete</a></td>
                        </tr>                        
                        ";  
                
                }
              
                echo "</table>
                    </div>";
                
            }
            
            // ELSE (IF IT IS A NORMAL USER) => DISPLAY USER GALLERY
            else {
                
                echo "<div class='gallery'>";

                foreach($_SESSION['private_gal']->getPictures() as $picture) {
                        
                            echo "
                                <div class=\"gal_element\"> 

                                    <img src='private_images/".$picture->getPath()."' alt='".$picture->getTitle()."' height='250px' />

                                    <div class=\"gal_overlay\">
                                        <div class=\"gal_buttons\">
                                            <a href='##view_details'    class='btn btn-default' role='button'>View More</a>
                                        </div>
                                    </div>

                                </div>
                            ";
                }
                
                echo "</div>";
                
            }
            
            ?>
            
        </div>

        <footer>
            <?php include_once("footer.php"); ?>
        </footer>

    </body>

</html>