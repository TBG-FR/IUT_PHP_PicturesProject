<?php

    require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start + Disconnection Management

?>

<!-- 'cart.php' ~ Displays the current cart, in order to purchase pictures -->

<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>Andrew Blind - Professional Photographer - Cart</title>
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
            
            <div class='cart'>
            
            <?php
            
            if($_SESSION['cart']->getNbPictures() == 0) {
                
                echo "                
                <p class='text'>Your cart is empty, there is no pictures in it !</p><br />                                 \r\n
                <img class='responsive_img' src='img/empty_cart.png' alt='Empty cart image (sad handbag)' /><br/>          \r\n                
                <a href='public_gallery.php' class='btntext btn btn-primary' role='button'>Let's find some you'll love !</a>        \r\n
                ";
                
            }
            
            else {
                
                foreach($_SESSION['cart']->getPictures() as $picture) {
                    
                    echo "
                    
                        <img src='private_images/".$picture->getPath()."' alt='".$picture->getTitle()."' height='50px' /> {$picture->getName()} | {$picture->getDesc()} | {$picture->getDate()}
                        
                        <a href='?action=cart_del&item_id=".$picture->getID()."'  class='littletextbtn btn btn-default' role='button'> Remove </a>
                        
                        <br/><br/>";  
                
                }
                
                echo "<div class='hline-bottom'></div>";
            
            $price = 25;
            echo "<p class='littletextbtn'>All my pictures are sold at the same price : $price €<br /></p>";
            
            $total = $_SESSION['cart']->getNbPictures() * 25;
            echo "<p class='littletextbtn'>Subtotal for your cart : $total €</p>";
                
                    echo"
                    <form class='btntext' action='checkout.php' method='post'>
                        <input type='hidden' name='action' value='checkout'/>                
                        <input type='submit' value='Checkout'>
                    </form>
                    ";              
                
            }
            
            ?>
                
            </div>
            
        </div>

        <footer>
            <?php include_once("footer.php"); ?>
        </footer>

    </body>

</html>