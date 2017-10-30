<?php

if ($_SESSION['user'] instanceof User) {
    
    if($_SESSION['user']->getAdmin() == '1') { include_once("navbar_admin.php"); }
        
    else
    if($_SESSION['user']->getAdmin() == '0') { include_once("navbar_user.php"); }
    
}

else { include_once("navbar_original.php"); }

?>