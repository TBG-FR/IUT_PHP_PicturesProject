<?php

session_start(); // Session Creation or Recovery

// require_once(""); // COMMENT

?>

<!-- index.php ~ Homepage -->

<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>Andrew Blind - Professional Photographer - Login/Register</title>
        <!-- <meta name="description" content=""> -->
        <!-- <meta name="author" content=""> -->

        <!-- CSS : Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="all" type="text/css">

        <!-- CSS : Custom -->
        <link href="css/style.css" rel="stylesheet" media="all" type="text/css">

        <!-- Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </head>

    <body>

        <header>
            <?php include_once("header.php"); ?>
            <?php include_once("navbar.php"); ?>
        </header>

        <div class="content">

            <!-- Logging Form -->
             <div id="login">
                 
                 <h2>Login</h2>
                 
                 <form action="login.php" method="post">
                     <!-- ADD : Mail or Username -->
                     Username : <input type="text" name="user" required> <br />
                     Password : <input type="password" name="pass" required> <br />
                     <!-- ADD : Captcha [] -->
                     
                     <?php
                     
                     if( isset($_SESSION['login_status'] ) == TRUE ) {
                         echo $_SESSION['login_status'];
                     }
                     else { /* do nothing */ }
                     
                     ?>
                     
                     <input type="submit" value="Login">
                 </form>
                 
            </div>
            
            <!-- Registering Form -->
             <div id="register">
                 
                 <h2>Register</h2>
                 
                 <form action="login.php" method="post">
                     <!-- ADD : Mail : <input type="text" name="mail"> <br /> -->
                     First name : <input type="text" name="f_name" required> <br />
                     Last name : <input type="text" name="l_name" required> <br />
                     <br />
                     Username : <input type="text" name="user" required> <br />
                     Password : <input type="password" name="pass" required> <br />
                     <!-- ADD : Captcha [] -->
                     
                     <?php
                     
                     if( isset($_SESSION['login_status'] ) == TRUE ) {
                         echo $_SESSION['login_status'];
                     }
                     else { /* do nothing */ }
                     
                     ?>
                     
                     <input type="submit" value="Register">
                 </form>
                 
            </div>

        </div>

        <footer>
            <?php include_once("footer.php"); ?>
        </footer>

    </body>

</html>