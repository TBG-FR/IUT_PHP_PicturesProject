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
                <img class='responsive_img' src='img/empty_cart.png' alt='Empty cart image (sad handbag)' /><br/>                                  \r\n                
                <a href='index.php' class='btntext btn btn-primary' role='button'>Let's find some you'll love !</a>         \r\n
                ";
                
            }
            
            else {
                
                echo "Picture | Picture Title | Picture Description | Date <br>";
                
                foreach($_SESSION['cart']->getPictures() as $picture) {
                    
                    echo "
                    
                        <img src='private_images/".$picture->getPath()."' alt='".$picture->getTitle()."' height='100px' /> {$picture->getName()} | {$picture->getDesc()} | {$picture->getDate()} 
                    
                        <a href='?action=edit&id={$picture->getId()}'    class='btn btn-default' role='button'> Edit </a>
                        
                        <a href='?action=delete&id={$picture->getId()}'  class='btn btn-default' role='button'> Delete </a>
                        
                        <br/><br/>
                        
                        ";  
                
                }
            
            $price = 25;
            echo "<p class='text'>All my pictures have the same price : $price €</p><br />";
            
            $total = $_SESSION['cart']->getNbPictures() * 25;
            echo "Subtotal for your cart : $total €";
                
                
            }
            
            ?>
                
            </div>
            
        </div>

        <footer>
            <?php include_once("footer.php"); ?>
        </footer>

    </body>

</html>