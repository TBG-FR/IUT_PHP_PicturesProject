<?php

    require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start + Disconnection Management    

?>

<!-- 'p_account.php' ~ Account Informations Management -->

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
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

    </head>

    <body>

        <header>
            <?php include_once("header.php"); ?>
            <?php include_once("navbar.php"); ?>
        </header>

        <div class="content">

            <?php            
            
            /* ===== ===== ===== IF USER IS CONNECTED => DISPLAY USEFUL LINKS ===== ===== ===== */ 
            if( $_SESSION['user'] instanceof User && $_SESSION['user']->getStatus() == TRUE ) {

                echo "
                
                    <!-- Logging Form -->
                    <div id='account'>

                        <h2>Account Informations</h2>

                        <form action='p_account.php' method='post'>
                        
                            Username : <input type='text' name='username' value='JeanJean' disabled> <br />
                            Email :  <input type='text' name='mail' value='Jean@hotmail.fr' disabled> <br />
                            Old Password : <input type='password' name='password_old' placeholder='Enter your current password'> <br />
                            New Password : <input type='password' name='password_new' placeholder='Enter your desired password'> <br />
                            Repeat Password : <input type='password' name='password_verif' placeholder='Repeat your desired password'> <br />
                            
                            <input type='hidden' name='action' value='account_info'/>                
                            <input type='submit' value='Validate modifications'>
                        </form>

                    </div>

                    <!-- Registering Form -->
                    <div id='billing'>

                         <h2>Billing Details</h2>

                         <form action='p_account.php' method='post'>
                         
                            First Name : <input type='text' name='firstname' value='Jean'> <br />
                            Last Name : <input type='text' name='lastname' value='Michel'> <br />
                            Complete Address : <input type='text' name='address' value='5 rue des champs'> <br />
                            City Name : <input type='text' name='city' value='Lyon'> <br />
                            ZIP Code : <input type='text' name='zipcode' value='69000'> <br />
                             
                             <input type='hidden' name='action' value='billing'/>                
                             <input type='submit' value='Validate modifications'>
                         </form>

                    </div>

                "; /* Echo[HTML] : End */

            }
            
            /* ===== ===== ===== ELSE (NOT CONNECTED) => _____ ===== ===== ===== */
            else {
                
                echo "
                
                    <div id='_'>

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