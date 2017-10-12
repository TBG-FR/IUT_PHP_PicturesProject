<?php

    session_start(); // Session Creation or Recovery

    require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co

if( isset($_SESSION['login_status'] ) == FALSE ) { $_SESSION['login_status'] = ''; }
if( isset($_SESSION['login_errors'] ) == FALSE ) { $_SESSION['login_errors'] = ''; }

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
            
            
            /* ===== ===== ===== IF A FORM HAS BEEN SENT => VALIDATE THE FORM, CHECK THE VALUES AND GET THE RESULTS ===== ===== ===== */            
            if ( $_POST ) {
                
                $db = new Database();
                
                foreach ($_POST as $champ => $valeur)
                    echo $champ.' --- '.$valeur.'<br />';
                //print_r($_POST);
                
                if ($_POST['action'] == 'login') {
                    
                    
                    /* AUTH THE USER *//* VALIDATE / CHECK / MODIFY VARIABLES / ETC */
                    echo " ===== ===== ===== AUTH ===== ===== ===== ";
                    
                    $username=var_secure($_POST['username']);
                    $password=var_secure($_POST['password']);
                    $password_removethat=$db->hash($password);
                    echo "CC -> $password_removethat" ;
                    
                    $req = $db->read('phpproj_user', array(
                        'conditions' => array(
                            'username LIKE' => "$username" // Check if there is an entry with the same username
                        ),
                        'fields' => array('id', 'username', 'password'), // get id, username and password
                    ));
                    
                    if( empty($req) == FALSE) { 
                    
                        if( $req[0]['password'] == $password) {
                            
                            echo "
                            
                            <div class=\"alert alert-success\" role=\"alert\">You've been succesfully authentified !</div><br />
                            
                            ";
                            
                            $_SESSION['login_status'] = "CONNECTED";
                            $_SESSION['username'] = $username;
                            
                        }
                        
                        else { $_SESSION['login_errors'] .= /* ADD THE FOLLOWING MESSAGE INTO THE ERRORS */ "
                    <br /><div class=\"alert alert-danger\" role=\"alert\">Error : Wrong User/Password combination ! Please try again.</div>"; }
                    
                    }
                    else { $_SESSION['login_errors'] .= /* ADD THE FOLLOWING MESSAGE INTO THE ERRORS */ "
                    <br /><div class=\"alert alert-danger\" role=\"alert\">Error : Unknown Username ! Please try again.</div>"; }
                    
                    var_dump($req);
                    
                    /*                    
                    if ( CDT ) { $_SESSION['login_errors'] .= "HTML + MESSAGE" }
                    */
                    
                }
                
                else if ($_POST['action'] == 'register') {
                    
                    /* REGISTER THE USER *//* VALIDATE / CHECK / MODIFY VARIABLES / ETC */
                    echo " ===== ===== ===== REGISTER ===== ===== ===== ";
                    
                    $username=var_secure($_POST['username']);
                    $password=var_secure($_POST['password']);
                    $firstname=var_secure($_POST['firstname']);
                    $lastname=var_secure($_POST['lastname']);
                    
                }
                
            }

            /* ===== ===== ===== IF USER IS LOGGED/CONNECTED/REGISTERED => DISPLAY USEFUL LINKS (AND SUCCESS MESSAGE) ===== ===== ===== */
            if( $_SESSION['login_status'] == "CONNECTED" /*|| $_SESSION['login_status'] == "JUST_CONNECTED" || $_SESSION['login_status'] == "JUST_REGISTERED" */ ) {
                
                /*if( $_SESSION['login_status'] == "JUST_CONNECTED" ) { echo "GREEN : JUST CONNECTED"; }
                else if( $_SESSION['login_status'] == "JUST_REGISTERED"  ) { echo "GREEN : JUST REGISTERED"; }*/

                echo "
                    <div class='mini_menu'>
                        <!-- Connected - Header -->
                        <h3>Logged as ".$_SESSION['username']."</h3><br />

                        <!-- Connected - Links -->
                        <a href=\"account.php\" class=\"btn btn-primary btn-block\" role=\"button\"><h4>Account Informations</h4></a>
                        <a href=\"gallery_p.php\" class=\"btn btn-primary btn-block\" role=\"button\"><h4>Personal Gallery</h4></a>
                        <a href=\"history_p.php\" class=\"btn btn-primary btn-block\" role=\"button\"><h4>Purchase History</h4></a>
                        <a href=\"logout.php\" class=\"btn btn-danger btn-block\" role=\"button\"><h4>Log out</h4></a>
                    </div>
                    
                "; /* Echo[HTML] : End */             

                /*$_SESSION['login_status'] = "CONNECTED";*/
            }
            
            /* ===== ===== ===== ELSE (FIRST ACCESS, OR ERRORS WERE FOUND WHILE PROCESSING THE FORM) => DISPLAY THE FORMS (AND THE ERRORS) ===== ===== ===== */
            else {
                 
                if( $_SESSION['login_errors'] != '' ) {
                    
                    echo $_SESSION['login_errors'];
                    /* HTML FORMATTING TO DO : 1 ERR = 1 MSG ? + http://coredogs.com/lesson/form-and-php-validation-one-page.html */
                
                    // Empty the Errors once they've been displayed
                    echo $_SESSION['login_errors']='';
                
                }
                
                
                
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