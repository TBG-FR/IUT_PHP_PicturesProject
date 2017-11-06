<?php   // File "cart.inc.php" : Cart Management (by GET Method), included on each page

if ( $_GET ) {

    // Some useful variable(s) here
    $already_in_cart = FALSE;

    /* --------------------------------------------------------------------- */

    // If the User clicked on "Add to Cart"
    if ($_GET['action'] == 'cart_add') {

        // If there is something in the Cart, forward every item of it
        if($_SESSION['cart']->getPictures() != NULL) {
            foreach($_SESSION['cart']->getPictures() as $picture) {

                // Check if the Picture has already been added to the Cart
                if($picture->getID() == $_GET['item_id']) { $already_in_cart = TRUE; }

            }

        }

        // If not (Picture hasn't already been added to the Cart), add it to the Cart
        if($already_in_cart == FALSE) {

            foreach($_SESSION['public_gal']->getPictures() as $picture) {

                // Verifies that it is in $_SESSION['public_gal'] (to avoid adding an hidden picture)
                if($picture->getID() == $_GET['item_id']) {

                    // Modify the State in Public_Gallery to "selected"
                    $picture->setState(1);

                    // Add the Picture to the Cart
                    $_SESSION['cart']->addPictureByCopy($picture);

                }
            }
        }
    }

    // If the User clicked on "Remove from Cart"
    if ($_GET['action'] == 'cart_del') {

        foreach($_SESSION['cart']->getPictures() as $cart_pic) {

            // If this Picture is in the Cart
            if($cart_pic->getID() == $_GET['item_id']) {
                
                // Modify the State in Public_Gallery
                foreach($_SESSION['public_gal']->getPictures() as $public_pic) { if($public_pic->getID() == $cart_pic->getID()) { $public_pic->setState(0); } }

                // Removes the Picture from the Cart
                $_SESSION['cart']->delPicture($cart_pic->getID());

            }

        }
    }

    // Useful to empty the cart (Cart menu, and for Devs/Tests)
    if ($_GET['action'] == 'cart_empty') {

        unset($_SESSION['cart']);
        unset($_SESSION['public_gal']);

    }

    // If the User has just been disconnected
    if ($_GET['action'] == 'highlight') {

        // HIGHLIGHT THE CLICKED PICTURE IN PRIVAE GALLERY

    }

}