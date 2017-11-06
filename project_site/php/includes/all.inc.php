<?php       // File "all.inc.php" : Include all files (classes, various things, etc.)

    require_once("/php/includes/various.inc.php"); // COMMENT
    require_once("/php/includes/conf.bdd.php"); // COMMENT
    require_once("/php/classes/Database.php"); // COMMENT
    require_once("/php/classes/User.php"); // COMMENT
    //include_once("example.inc.php"); // COMMENT
    //include_once("imgwatermark.inc.php"); // COMMENT
    include_once("/php/classes/Picture.php"); // COMMENT
    include_once("/php/classes/Gallery.php"); // COMMENT

    session_start(); // Session Creation or Recovery

//echo "BEFORE <br/>"; var_dump($_SESSION['public_gal']); var_dump($_SESSION['cart']);

    require_once("/php/includes/logout.inc.php"); // COMMENT
    require_once("/php/includes/cart.inc.php"); // COMMENT
    require_once("/php/includes/unsets.inc.php"); // COMMENT

//echo "AFTER <br/>"; var_dump($_SESSION['public_gal']); var_dump($_SESSION['cart']); 

?>