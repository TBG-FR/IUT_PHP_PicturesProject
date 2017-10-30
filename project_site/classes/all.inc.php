<?php       // File "all.inc.php" : Include all files (classes, various things, etc.)

    include_once("various.inc.php"); // COMMENT
    include_once("conf.bdd.php"); // COMMENT
    include_once("Database.php"); // COMMENT
    include_once("User.php"); // COMMENT
    //include_once("example.inc.php"); // COMMENT
    //include_once("imgwatermark.inc.php"); // COMMENT

    session_start(); // Session Creation or Recovery

    if( isset($_SESSION['login_status']) == FALSE ) { $_SESSION['login_status'] = ''; }
    if( isset($_SESSION['login_errors']) == FALSE ) { $_SESSION['login_errors'] = ''; }
    if( isset($_SESSION['user']) == FALSE ) { $_SESSION['user'] = ''; }

?>