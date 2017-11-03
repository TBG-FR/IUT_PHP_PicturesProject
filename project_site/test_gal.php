<?php

    require_once("classes/all.inc.php");

?>

<!-- gallery.php ~ Displays the public gallery (without login, and with watermarked pictures) -->

<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>Andrew Blind - Professional Photographer - Gallery</title>
        <!-- <meta name="description" content=""> -->
        <!-- <meta name="author" content=""> -->

        <!-- CSS : Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet" media="all" type="text/css">

        <!-- CSS : Fancybox -->        
        <link  href="css/jquery.fancybox.css" rel="stylesheet">

        <!-- CSS : Custom -->
        <link href="css/style.css" rel="stylesheet" media="all" type="text/css">

        <!-- Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.fancybox.js"></script>

    </head>

    <body>

        <header>
        </header>

        <div class="content">

            <div class="gallery">

                <!-- ----- ----- ----- ----- Gallery Element #1 [BEGIN] ----- ----- ----- ----- -->
                <div class="gal_element"> 
                    
                    <img src="public_images/small_observation_deck___wallpaper_by_z_design-d2q7jic.jpg" alt="" />
                    
                    <div class="gal_overlay">
                        <!-- DEFAULT STYLE FOR ITEM -->
                        <a href='###add_to_cart'    class='btn btn-primary' role='button'>Add to Cart</a>
                        <a href='##view_details'    class='btn btn-default' role='button'>View More</a>
                        <!-- ONCE ITEM IS IN CART
                        <a href='###add_to_cart'    class='btn btn-danger' role='button'>Remove from Cart</a>
                        <a href='##view_details'    class='btn btn-default' role='button'>View More</a>         -->
                        <!-- ONCE ITEM IS BOUGHT 
                        <a href='###add_to_cart'    class='btn btn-success' role='button'>Already Bought</a>                
                        <a href='##view_details'    class='btn btn-default' role='button'>View More</a>         -->
                    </div>
                    
                </div> 
                <!-- ----- ----- ----- ----- Gallery Element #1 [END] ----- ----- ----- ----- -->

                <!-- ----- ----- ----- ----- Gallery Element #2 [BEGIN] ----- ----- ----- ----- -->
                <div class="gal_element"> 
                    
                    <img src="public_images/smallatlantis_nebula_7-wallpaper-5120x3200.jpg" alt="" />
                    
                    <div class="gal_overlay">
                        <!-- DEFAULT STYLE FOR ITEM 
                        <a href='###add_to_cart'    class='btn btn-primary' role='button'>Add to Cart</a>
                        <a href='##view_details'    class='btn btn-default' role='button'>View More</a>         -->
                        <!-- ONCE ITEM IS IN CART -->
                        <a href='###add_to_cart'    class='btn btn-danger' role='button'>Remove from Cart</a>
                        <a href='##view_details'    class='btn btn-default' role='button'>View More</a>
                        <!-- ONCE ITEM IS BOUGHT 
                        <a href='###add_to_cart'    class='btn btn-success' role='button'>Already Bought</a>                
                        <a href='##view_details'    class='btn btn-default' role='button'>View More</a>         -->
                    </div>
                    
                </div> 
                <!-- ----- ----- ----- ----- Gallery Element #2 [END] ----- ----- ----- ----- -->

                <!-- ----- ----- ----- ----- Gallery Element #3 [BEGIN] ----- ----- ----- ----- -->
                <div class="gal_element"> 
                    
                    <img src="public_images/small_observation_deck___wallpaper_by_z_design-d2q7jic.jpg" alt="" />
                                        
                    <div class="gal_overlay">
                        <!-- DEFAULT STYLE FOR ITEM 
                        <a href='###add_to_cart'    class='btn btn-primary' role='button'>Add to Cart</a>
                        <a href='##view_details'    class='btn btn-default' role='button'>View More</a>         -->
                        <!-- ONCE ITEM IS IN CART
                        <a href='###add_to_cart'    class='btn btn-danger' role='button'>Remove from Cart</a>
                        <a href='##view_details'    class='btn btn-default' role='button'>View More</a>         -->
                        <!-- ONCE ITEM IS BOUGHT  -->
                        <a href='###add_to_cart'    class='btn btn-success' role='button'>Already Bought</a>                
                        <a href='##view_details'    class='btn btn-default' role='button'>View More</a>
                    </div>
                    
                </div> 
                <!-- ----- ----- ----- ----- Gallery Element #3 [END] ----- ----- ----- ----- -->

                <!-- ----- ----- ----- ----- Gallery Element #4 [BEGIN] ----- ----- ----- ----- -->
                <div class="gal_element"> 
                    
                    <img src="public_images/smallatlantis_nebula_7-wallpaper-5120x3200.jpg" alt="" />
                                        
                    <div class="gal_overlay">
                        <a href='###add_to_cart'    class='btn btn-primary' role='button'>Add to Cart</a>
                        <a href='##view_details'    class='btn btn-default' role='button'>View More</a>
                        <!-- ONCE ITEM IS IN CART
                        <a href='###add_to_cart'    class='btn btn-danger' role='button'>Remove from Cart</a>
                        <a href='##view_details'    class='btn btn-default' role='button'>View More</a>         -->
                        <!-- ONCE ITEM IS BOUGHT 
                        <a href='###add_to_cart'    class='btn btn-success' role='button'>Already Bought</a>                
                        <a href='##view_details'    class='btn btn-default' role='button'>View More</a>         -->
                    </div>
                    
                </div>
                
                <!-- ----- ----- ----- ----- Gallery Element #4 [END] ----- ----- ----- ----- -->
                
                <?php
                
                $test = new Picture(25,'Paysage','Mangifik truc la bas',TRUE,'/pb/aaaaaler.png','0');
                var_dump($test);
                
                $testg = new Gallery(125,FALSE,TRUE);
                var_dump($testg);
                    
                ?>

                <!--

<a class="gallery_img" href="public_images/observation_deck___wallpaper_by_z_design-d2q7jic.jpg" data-fancybox data-caption="CAPTION">
</a>

<a class="gallery_img" href="public_images/atlantis_nebula_7-wallpaper-5120x3200.jpg" data-fancybox data-caption="CAPTION">
<img src="public_images/smallatlantis_nebula_7-wallpaper-5120x3200.jpg" alt="" />
</a>

<a class="gallery_img" href="public_images/observation_deck___wallpaper_by_z_design-d2q7jic.jpg" data-fancybox data-caption="CAPTION">
<img src="public_images/small_observation_deck___wallpaper_by_z_design-d2q7jic.jpg" alt="" />
</a>

<a class="gallery_img" href="public_images/atlantis_nebula_7-wallpaper-5120x3200.jpg" data-fancybox data-caption="CAPTION">
<img src="public_images/smallatlantis_nebula_7-wallpaper-5120x3200.jpg" alt="" />
</a> -->


                <!-- Images (Gallery)
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
<img src="public_images/observation_deck___wallpaper_by_z_design-d2q7jic.jpg" alt="" title="" height="200px"> -->

            </div>
        </div>

        <footer>
        </footer>

    </body>

</html>