<?php   // File "logout.inc.php" : Disconnection Managament (by GET Method), included on each page

if ( $_GET ) {

    // If the User has just been disconnected
    if ($_GET['action'] == 'disconnected') {

        echo "<div class='notification alert alert-warning' role='alert'>You've been succesfully disconnected !</div><br />";

    }


    // If the User clicks on "Logout" AND is logged (An instance of User is still in $_SESSION)
    if ($_GET['action'] == 'disconnect' &&  $_SESSION['user'] instanceof User ) {

        // Disconnect the user and unset the corresponding variables in $_SESSION      
        $_SESSION['user']->disconnect();
        unset($_SESSION['user']);
        unset($_SESSION['public_gal']);
        unset($_SESSION['private_gal']);
        unset($_SESSION['cart']);

        if( $_GET['source'] == "private_gallery.php" || strpos($_GET['source'], admin) == TRUE /*|| $_GET['source'] == "other_page_requiring_login.php"*/ ) {

            // Send the User back on the page where he was
            $loc = "Location: index.php?action=disconnected";
            header($loc);

        }

        else  {

            // Send the User back on the page where he was
            $loc = "Location: ".$_GET['source']."?action=disconnected";
            header($loc);

        }

    }

}