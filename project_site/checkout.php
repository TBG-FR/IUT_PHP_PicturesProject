<?php

    require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start + Disconnection Management

    if ( $_GET ) {

        if($_GET['action'] == 'checkout') {

            foreach($_SESSION['cart']->getPictures() as $boughtpic) {

               $buy=$db->save($bdd_table_gal_pic, array(
                'pic_id'=>$boughtpic->getID(),
                   'gal_id'=>$_SESSION['user']->getID()
               ));
                
            }

            unset($_SESSION['cart']); unset($_SESSION['public_gal']); unset($_SESSION['private_gal']);
            echo "<script type='text/javascript'>document.location.replace('login.php?action=bought');</script>";
            
        }        
    }

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

                // IF THE USER CLICKED ON CHECKOUT
                if( $_POST['action'] == 'checkout') {

                    // IF THE USER IS LOGGED => DISPLAY CHECKOUT
                    if( $_SESSION['user'] instanceof User ) { 

                        echo "                
                            <div class='large_menu'>
                                <!-- Checkout - Title -->
                                <p class='title'>Checkout</p><br />

                                <!-- Checkout - Links -->
                                <a href='#NOT_YET_IMPLEMENTED' class='btn btn-warning btn-block btntext' role='button'>Facturation Informations</a>
                                <a href='#NOT_YET_IMPLEMENTED' class='btn btn-warning btn-block btntext' role='button'>Download Invoice</a>
                                <a href='?action=checkout' class='btn btn-success btn-block btntext' role='button'>Checkout</a>
                            </div>

                        "; /* Echo[HTML] : End */

                    }

                    // ELSE (THE USER ISN'T LOGGED) => DISPLAY THE LOGIN MESSAGE
                    else {

                        echo "                
                            <p class='text'>You need to be logged to checkout !</p><br />                               \r\n               
                            <a href='login.php' class='btntext btn btn-primary' role='button'>Let's auth myself !</a>   \r\n
                            ";

                    }

                }

                // ELSE (HE CAME HERE BY ERROR) => REDIRECT HIM
                else {echo "<script type='text/javascript'>document.location.replace('cart.php');</script>";}

                ?>

            </div>

        </div>

        <footer>
            <?php include_once("footer.php"); ?>
        </footer>

    </body>

</html>