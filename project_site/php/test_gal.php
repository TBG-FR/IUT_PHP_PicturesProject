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

        <?php include_once("head.php"); // Make all the CSS & JavaScript links ?>

    </head>

    <body>

        <header>
        </header>

        <div class="content">

            <div class="gallery">

                <?php

                foreach($_SESSION['public_gal']->getPictures() as $picture) {
                    
                    switch ($picture->getState()) {
                            
                            // State 0 : "normal" picture
                        case 0:
                            echo "
                                <div class=\"gal_element\"> 

                                    <img src='".$picture->getPath()."' alt='' />

                                    <div class=\"gal_overlay\">
                                    <a href='###add_to_cart'    class='btn btn-primary' role='button'>Add to Cart</a>
                                    <a href='##view_details'    class='btn btn-default' role='button'>View More</a>
                                    </div>

                                </div>
                            ";
                            break;
                            
                            // State 1 : picture "selected" (in cart)
                        case 1:
                            echo "
                                <div class=\"gal_element\"> 

                                    <img src='public_images/seagulls.jpeg' alt='' />

                                    <div class=\"gal_overlay\">
                                    <a href='###add_to_cart'    class='btn btn-danger' role='button'>Remove from Cart</a>
                                    <a href='##view_details'    class='btn btn-default' role='button'>View More</a>
                                    </div>

                                </div>
                            ";
                            break;
                            
                            // State 2 : picture already bought
                        case 2:
                            echo "
                                <div class=\"gal_element\"> 

                                    <img src='public_images/seagulls.jpeg' alt='' />

                                    <div class=\"gal_overlay\">
                                    <a href='###add_to_cart'    class='btn btn-success' role='button'>Already Bought</a>
                                    <a href='##view_details'    class='btn btn-default' role='button'>View More</a>
                                    </div>

                                </div>
                            ";
                            break;
                    }

                }

                ?>

                <!-- ----- ----- ----- ----- ----- ------ ----- ----- ----- ----- ----- -->

                <?php

                $test = new Picture(25,'Paysage','Mangifik truc la bas',"20/12/1997",TRUE,'/pb/aaaaaler.png','0');
                var_dump($test);

                //__construct($user_id, $logged, $public)
                echo "--------------- NOT LOGGED + PUBLIC ---------- <br/><br/>";
                $testa = new Gallery(125,FALSE,TRUE);
                var_dump($testa);
                echo "--------------- ID=2 + LOGGED + NOT PUBLIC ---------- <br/><br/>";
                $testb = new Gallery(2,TRUE,FALSE);
                var_dump($testb);
                echo "--------------- ID=4 + LOGGED + NOT PUBLIC ---------- <br/><br/>";
                $testc = new Gallery(4,TRUE,FALSE);
                var_dump($testc);
                echo "--------------- ID=4 + LOGGED + PUBLIC ---------- <br/><br/>";
                $testd = new Gallery(4,TRUE,TRUE);
                var_dump($testd);

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