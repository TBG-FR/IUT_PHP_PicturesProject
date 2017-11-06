<?php

// IF User is logged (An instance of User is in $_SESSION)
if ($_SESSION['user'] instanceof User) {
    
    // IF User is Administrator
    if($_SESSION['user']->getAdmin() == '1') { include_once("/navbars/navbar_admin.php"); }
    
    // ELSE IF User is a "normal" user
    else if($_SESSION['user']->getAdmin() == '0') { include_once("/navbars/navbar_user.php"); }
    
}

// ELSE (User not logged)
else { include_once("/navbars/navbar_original.php"); }

?>