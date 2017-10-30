<?php   // File "logout.inc.php" : Disconnection Managament (by GET Method), included on each page

if ( $_GET ) {
        
        // If the User has just been disconnected
        if ($_GET['action'] == 'disconnected') {
            
            echo "<div class='notification alert alert-warning' role='alert'>You've been succesfully disconnected !</div><br />";
            
        }
        
        
        // If the User clicks on "Logout" AND is logged (An instance of User is still in $_SESSION)
        if ($_GET['action'] == 'disconnect' &&  $_SESSION['user'] instanceof User ) {
            
            // Disconnect the user and empty the corresponding variable in Session         
            $_SESSION['user']->disconnect();
            $_SESSION['user']='';
            
            // Send the User back on the page where he was
            $loc = "Location: ".$_GET['source']."?action=disconnected";
            header($loc);
        
        }
    
}