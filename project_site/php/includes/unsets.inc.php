<?php       // File "unset.inc.php" : Manage how to react if each (global) variable isn't set or has been unset

//    if( isset($_SESSION['login_status']) == FALSE ) { $_SESSION['login_status'] = ''; }
//    if( isset($_SESSION['login_errors']) == FALSE ) { $_SESSION['login_errors'] = ''; }
    if( isset($_SESSION['user']) == FALSE ) { $_SESSION['user'] = ''; }

    //if( isset($_SESSION['public_gal']) == FALSE ) { $_SESSION['public_gal'] = new Gallery(0, FALSE, TRUE); }
    if( isset($_SESSION['public_gal']) == FALSE ) {
        
        if ( $_SESSION['user'] instanceof User ) { $_SESSION['public_gal'] = new Gallery($_SESSION['user']->getID(), TRUE, TRUE); }
            
            else { $_SESSION['public_gal'] = new Gallery(0, FALSE, TRUE); }
        
    }

    //if( isset($_SESSION['private_gal']) == FALSE ) { $_SESSION['private_gal'] = ''; }
    if( isset($_SESSION['private_gal']) == FALSE ) {
        
        if ( $_SESSION['user'] instanceof User ) { $_SESSION['private_gal'] = new Gallery($_SESSION['user']->getID(), TRUE, FALSE); }
            
            else { $_SESSION['private_gal'] = ''; }
        
    }

    if( isset($_SESSION['cart']) == FALSE ) { $_SESSION['cart'] = new Gallery(-1, TRUE, FALSE); }

?>