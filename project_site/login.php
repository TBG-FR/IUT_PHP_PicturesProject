<?php

    require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start

    if( isset($_SESSION['login_status'] ) == FALSE ) { $_SESSION['login_status'] = ''; }
    if( isset($_SESSION['login_errors'] ) == FALSE ) { $_SESSION['login_errors'] = ''; }
    if( isset($_SESSION['user'] ) == FALSE ) { $_SESSION['user'] = ''; }

    if ( $_GET ) {
        
        // If the User has just been disconnected
        if ($_GET['action'] == 'disconnected') {
            
            echo "<div class=\"notification alert alert-warning\" role=\"alert\">You've been succesfully disconnected !</div><br />";
        
        }
        
        // If the User clicks on "Logout" AND is logged (An instance of User is still in his Session)
        if ($_GET['action'] == 'disconnect' &&  $_SESSION['user'] instanceof User ) {
            
            // Disconnect the user and empty the corresponding variable in Session
            //$_SESSION['login_status'] = "";
            //$_SESSION['PrKz5gfNz'] = 0;            
            $_SESSION['user']->disconnect();
            $_SESSION['user']='';
            
            // Send the User back on the page where he was
            $loc = "Location: ".$_GET['source']."?action=disconnected";
            header($loc);
            
            // +++ Display a disconnection message ?
        
        }
    }

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

            <?php

            /* -------------------------------------------------------------------------------------
            SI CONNECTE : AFFICHER [COMPTE] [GALLERIE PERSO] [DECONNEXION]
            SINON : FORMULAIRES

            APRES ENVOI :
                SI OK -> AFFICHER "CONNECTE" + MESSAGE GREEN
                SI ERREUR(S) -> AFFICHER ERREURS (MESSAGE RED) + FORMULAIRE REMPLI
                    https://getbootstrap.com/docs/4.0/components/alerts/
            ----------------------------------------------------------------------------------------*/
            
            /*if ( $_GET ) {
                
                if ($_GET['action'] == 'disconnect') {
                    
                    //$_SESSION['login_status'] = "";
                    //$_SESSION['PrKz5gfNz'] = 0;
                    
                    $_SESSION['user']->disconnect();
                    $_SESSION['user']='';
                    
                }
                
            }*/
            
            
            /* ===== ===== ===== IF A FORM HAS BEEN SENT => VALIDATE THE FORM, CHECK THE VALUES AND GET THE RESULTS ===== ===== ===== */            
            if ( $_POST ) {
                
                $db = new Database();
                
                foreach ($_POST as $champ => $valeur)
                    echo $champ.' --- '.$valeur.'<br />';
                //print_r($_POST);
                
                // If the User tried to Log himself to his account
                if ($_POST['action'] == 'login') {
                    
                    echo " ===== ===== ===== AUTH ===== ===== ===== ".$db->hash(var_secure($_POST['password']))." ========== ";
                    
                    // Transform the given credentials to avoid injections & other attacks
                    $username=var_secure($_POST['username']);
                    $password=var_secure($_POST['password']);
                    
                    // Create a new Instance of User Class with the given credentials (and catch errors if they're wrong)                    
                    try { $_SESSION['user'] = User::constructByLogin($username, $password); }
                    catch (Exception $e) {
                        
                        if($e->getMessage() == 'Err_BadCredentials') {                             
                            echo "<br /><div class=\"notification alert alert-danger\" role=\"alert\">Error : Wrong User/Password combination ! Please try again.</div>"; }
                        
                        else if ($e->getMessage() == 'Err_UnknownUsername') {
                            echo "<br /><div class=\"notification alert alert-danger\" role=\"alert\">Error : Unknown Username ! Please try again.</div>"; }
                        
                    }
                    
                }
                
                else if ($_POST['action'] == 'register') {
                    
                    echo " ===== ===== ===== REGISTER ===== ===== ===== ".$db->hash(var_secure($_POST['password']))." ========== ";
                    
                    // Transform the given informations to avoid injections & other attacks
                    $username=var_secure($_POST['username']);
                    $password=var_secure($_POST['password']);
                    $password_verif=var_secure($_POST['password_verif']);
                    $firstname=var_secure($_POST['firstname']);
                    $lastname=var_secure($_POST['lastname']);
                    
                    // Create a new Instance of User Class with the given credentials (and catch errors if they're wrong)                    
                    try { $_SESSION['user'] = new User($username, $password, $password_verif, $firstname, $lastname); }
                    catch (Exception $e) {
                        
                        if($e->getMessage() == 'Err_XXX') {                             
                            echo "<br /><div class=\"notification alert alert-danger\" role=\"alert\">Error : XXX ! Please try again.</div>"; }
                        
                        else if ($e->getMessage() == 'Err_YYY') {
                            echo "<br /><div class=\"notification alert alert-danger\" role=\"alert\">Error : YYY ! Please try again.</div>"; }
                        
                    }
                    
                }
            }
           
            echo "___________ [_]_[_] ___________ [_]_[_] ___________ [_]_[_] ___________";
            var_dump($_SESSION['user']);
            echo "___________ [_]_[_] ___________ [_]_[_] ___________ [_]_[_] ___________";
                
            /* ===== ===== ===== IF USER IS CONNECTED => DISPLAY USEFUL LINKS ===== ===== ===== */ 
            if( $_SESSION['user'] instanceof User && $_SESSION['user']->getStatus() == TRUE ) {

                $l_username=$_SESSION['user']->getUsername();
                
                echo "
                
                    <div class='mini_menu'>
                        <!-- Connected - Header -->
                        <h3>Logged as ".$l_username."</h3><br />

                        <!-- Connected - Links -->
                        <a href=\"account.php\" class=\"btn btn-primary btn-block\" role=\"button\"><h4>Account Informations</h4></a>
                        <a href=\"gallery_p.php\" class=\"btn btn-primary btn-block\" role=\"button\"><h4>Personal Gallery</h4></a>
                        <a href=\"history_p.php\" class=\"btn btn-primary btn-block\" role=\"button\"><h4>Purchase History</h4></a>
                        <a href=\"?action=disconnect\" class=\"btn btn-danger btn-block\" role=\"button\"><h4>Log out</h4></a>
                    </div>
                    
                "; /* Echo[HTML] : End */
            }
            
            /* ===== ===== ===== ELSE (FIRST ACCESS, OR ERRORS WERE FOUND WHILE PROCESSING THE FORM) => DISPLAY THE FORMS ===== ===== ===== */
            else {
                
                /* KEEP THE USER'S ENTRIES IN CASE OF ERRORS => DEPENDING ON THE ERROR ? */
                $temp_user = 'USER';
                $temp_mail = 'MAIL';
                $temp_firstname = 'F.NAME';
                $temp_lastname = 'L.NAME';

                echo "
                
                    <!-- Logging Form -->
                    <div id=\"login\">

                        <h2>Login</h2>

                        <form action=\"login.php\" method=\"post\">
                        
                            <!-- ADD : Mail or Username -->
                            Username : <input type=\"text\" name=\"username\" value=\"$temp_user\" required> <br />
                            Password : <input type=\"password\" name=\"password\" required> <br />
                            <!-- ADD : Captcha [] -->
                            
                            <input type=\"hidden\" name=\"action\" value=\"login\"/>                
                            <input type=\"submit\" value=\"Login\">
                        </form>

                    </div>

                    <!-- Registering Form -->
                    <div id=\"register\">

                         <h2>Register</h2>

                         <form action=\"login.php\" method=\"post\">
                         
                             <!-- ADD : Mail : <input type=\"text\" name=\"mail\" value=\"$temp_mail\" > <br /> -->
                             First name : <input type=\"text\" name=\"firstname\" value=\"$temp_firstname\" required> <br />
                             Last name : <input type=\"text\" name=\"lastname\" value=\"$temp_lastname\" required> <br />
                             <br />
                             Username : <input type=\"text\" name=\"username\" value=\"$temp_user\" required> <br />
                             Password : <input type=\"password\" name=\"password\" required> <br />
                             Password (Repeat) : <input type=\"password\" name=\"password_verif\" required> <br />
                             <!-- ADD : Captcha [] -->
                             
                             <input type=\"hidden\" name=\"action\" value=\"register\"/>                
                             <input type=\"submit\" value=\"Register\">
                         </form>

                    </div>

                "; /* Echo[HTML] : End */

            }

            ?>

        </div>

        <footer>
            <?php include_once("footer.php"); ?>
        </footer>

    </body>

</html>