<?php       // File "all.inc.php" : Include all files (classes, various things, etc.)

    require_once("various.inc.php"); // COMMENT
    require_once("conf.bdd.php"); // COMMENT
    require_once("Database.php"); // COMMENT
    require_once("User.php"); // COMMENT
    //include_once("example.inc.php"); // COMMENT
    //include_once("imgwatermark.inc.php"); // COMMENT
    include_once("Picture.php"); // COMMENT
    include_once("Gallery.php"); // COMMENT

    session_start(); // Session Creation or Recovery

//echo "BEFORE <br/>"; var_dump($_SESSION['public_gal']); var_dump($_SESSION['cart']);

    require_once("logout.inc.php"); // COMMENT
    require_once("cart.inc.php"); // COMMENT
    require_once("unsets.inc.php"); // COMMENT

//echo "AFTER <br/>"; var_dump($_SESSION['public_gal']); var_dump($_SESSION['cart']); 

?>