<?php

require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start + Disconnection Management    

?>

<!-- 'index.php' ~ Homepage -->

<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>Andrew Blind - Professional Photographer - Home</title>
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

            <!-- Short Description -->
            <p class="short_text">
                I'm Andrew Blind, a professional photographer since 1997, located in the USA. <br />
                Welcome to my Website, where you can have a look at my pictures, and even buy them if you like them and want to support my work ! <br />
                Don't hesitate to contact me for any questions or inquiries ! <br />
            </p>

            <!-- Slider "Carousel" -->

            <div class="Carousel_container">
                <div id="Carousel_Index" class="carousel slide" data-ride="carousel">
                        
                    <?php
                   
                    echo " <!-- Navigation Buttons -->
                            <ol class='carousel-indicators'>";

                        $db = new Database();
                        
                        // Forward all "Homepage" pictures (ID>10000)

                        $carousel_img = $db->read($bdd_table_picture, array(
                            'conditions' => array(
                                'id <' => '0'
                            ),
                            'fields' => array('*'),
                        ));

                        $i=0;
                        
                        // For each image, display a button
                    
                    foreach($carousel_img as $pic) {

                            if($i==0) { echo "<li data-target='#Carousel_Index' data-slide-to='0' class='active'></li>"; }

                            else  { echo "<li data-target='#Carousel_Index' data-slide-to='$i'></li>"; }
                            
                            $i++; 
                    }
                        
                        echo "</ol>";

                        
                        echo "<!-- Div containing Slides -->
                                <div class='carousel-inner'>";
                        
                        // For each image, display a picture with details

                        $i=0;

                        foreach($carousel_img as $pic) {

                            if($i==0) {

                                echo "
                                    <!-- Slide #0 (Active) -->
                                    <div class='item active item-0'>
                                        <img src='public_images/".$pic['path']."' alt='".$pic['title']."' />
                                        <div class='carousel-caption'>".$pic['description']."</div>
                                    </div>                            
                                ";
                            }

                            else {

                                echo "
                                 <!-- Slide #$i -->
                                 <div class='item item-$i'>
                                     <img src='public_images/".$pic['path']."' alt='".$pic['title']."' />
                                     <div class='carousel-caption'>".$pic['description']."</div>
                                 </div>                            
                                ";
                            }
                            
                            $i++;                                
                                
                        }

                        ?>
                        
                    </div>

                    <!-- "Previous" & "Next" Buttons -->
                    <a class="left carousel-control" href="#Carousel_Index" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#Carousel_Index" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <!-- Link to Gallery -->
            <h3><a href="gallery.php">See/Buy all my Pictures</a></h3>

        </div>

        <footer>
            <?php include_once("footer.php"); ?>
        </footer>

    </body>

</html>