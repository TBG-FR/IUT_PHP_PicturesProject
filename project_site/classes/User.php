<?php

    //require_once('conf.bdd.php');

/**
 * Class User
 * {DESCRIPTION}
 */
class User
{

    /* ----- ----- ----- Attributes ----- ----- ----- */
    
    /* === Login & Technical Informations === */

    /**
     * @var int : ID (Useful for database link)
     */
    private $id;
    
    /**
     * @var string : Username
     */
    private $username;

    /**
     * @var string : Hashed Password
     */
    private $password;

    /**
     * @var int : Determines if the user is an Administrator
     */
    private $admin;

    /**
     * @var bool : Determines if the user is Logged (TRUE) or not (FALSE)
     */
    private $status;
    
    /* === Personal & Contact Informations === */

    /**
     * @var string : Firstname
     */
    private $firstname;

    /**
     * @var string : Lastname
     */
    private $lastname;

    /**
     * @var string : Postal Address
     */
    private $address;

    /**
     * @var int : Postal Code/ZIP
     */
    private $zip;

    /**
     * @var string : City
     */
    private $city;

    /**
     * @var string : Email Address
     */
    private $email;

    /* ----- ----- ----- Constructors ----- ----- ----- */

    /**
     * User simple constructor
     */
    public function __construct(){
        
    }

    /**
     * User constructor by Login
     * @param string $login
     * @param string $pass
     */
    public static function constructByLogin($login,$pass){
        
        /* TEMP TEMP ----- ----- TEMP TEMP */

        $bdd_table_user = 'phpproj_user';
        $bdd_table_picture = 'phpproj_picture';
        $bdd_table_pic_key = 'phpproj_pictureKeyword';
        $bdd_table_keyword = 'phpproj_keyword';
        $bdd_table_gallery = 'phpproj_gallery';
        $bdd_table_gal_pic = 'phpproj_galleryPicture';
        
        /* TEMP TEMP ----- ----- TEMP TEMP */
        
        $db = new Database();

        $req = $db->read($bdd_table_user, array(
            'conditions' => array(
                'username LIKE' => "$login" // Check if there is an entry with the same username
            ),
            'fields' => array('id', 'username', 'password', 'admin', 'firstname', 'lastname', 'address', 'zip', 'city', 'email'), // Get informations from the Database
        ));

        if( empty($req) == FALSE) { 

            if( $req[0]['password'] == $db->hash($pass) ) {
                
                $user = New User();
                $user->id = $req[0]['id'];
                $user->username = $req[0]['username'];
                $user->password = $db->hash($req[0]['password']);
                $user->admin = $req[0]['admin'];
                $user->status = TRUE;
                $user->firstname = $req[0]['firstname'];
                $user->lastname = $req[0]['lastname'];
                $user->address = $req[0]['address'];
                $user->zip = $req[0]['zip'];
                $user->city = $req[0]['city'];
                $user->email = $req[0]['email'];

                echo "<div class=\"notification alert alert-success\" role=\"alert\">You've been succesfully authentified !</div><br />";
                
                return $user;

            }

            else {
                //echo "<br /><div class=\"notification alert alert-danger\" role=\"alert\">Error : Wrong User/Password combination ! Please try again.</div>";
                throw new Exception('Err_BadCredentials');
                 }

        }
        else {
            //echo "<br /><div class=\"notification alert alert-danger\" role=\"alert\">Error : Unknown Username ! Please try again.</div>";
            throw new Exception('Err_UnknownUsername');
             }

        var_dump($req); /* TEMP */

    }

    /**
     * User constructor by Registration
     * @param string $login
     * @param string $pass
     */
    public static function constructByRegister($login, $pass, $pass_v, $f_name, $l_name, $mail) {
        
        /* TEMP TEMP ----- ----- TEMP TEMP */

        $bdd_table_user = 'phpproj_user';
        $bdd_table_picture = 'phpproj_picture';
        $bdd_table_pic_key = 'phpproj_pictureKeyword';
        $bdd_table_keyword = 'phpproj_keyword';
        $bdd_table_gallery = 'phpproj_gallery';
        $bdd_table_gal_pic = 'phpproj_galleryPicture';
        
        /* TEMP TEMP ----- ----- TEMP TEMP */
        
        $db = new Database();

        $req = $db->read($bdd_table_user, array(
            'conditions' => array(
                'username LIKE' => "$login" // Check if there is an entry with the same username
            ),
            'fields' => array('username'), // get that result (username)
        ));

        // If an User with the same Username has been found => Throw Exception
        if( empty($req) == FALSE) {
            
            //echo "<div class=\"notification alert alert-danger\" role=\"alert\">Error : Username already taken ! Please try again with another one.</div>";
            throw new Exception('Err_UsernameExists');
            
        }
        
        // Else, If the Password and the "Verification Password" aren't the same => Throw Exception
        else if ( $pass != $pass_v ) {
            
            //echo "<div class=\"notification alert alert-danger\" role=\"alert\">Error : Passwords aren't matching ! Please try again.</div>";
            throw new Exception('Err_PasswordMatch');
            
        }
        
        // Else, add the User into the Database
        else {
            
            // Insert the new User into the corresponding table
            $user_insert = $db->save($bdd_table_user, array(
                    'username' => $login,
                    'admin' => 0,
                    'password' => $pass, // le mot de passe sera crypté automatiquement selon la règle choisi dans la méthode hash()
                    'firstname' => $f_name,
                    'lastname'  => $l_name,
                    'email' => $mail
                ));
            
            
            // Normally, this part would be unnecessary, we would just check if $up return TRUE, but the method save() strangely return an empty array...            
            $user_check = $db->read($bdd_table_user, array(
                'conditions' => array(
                    'username LIKE' => "$login" // Check if there is an entry with the same username
                ),
                'fields' => array('id', 'username'), // get result (id, username)
            ));
            
            // If the Insertion succeeded => Display a success message and add those values into the User instance created
            //if($up) {
            if( empty($user_check) == FALSE ) {
                
                echo "<div class=\"notification alert alert-success\" role=\"alert\">You've been succesfully registered !</div><br />";
                
                //Then try to log the User, the same way as if he logged himself with the Login form (And ctach errors, even if it shouldn't happen just after registering)           
                try { $user = User::constructByLogin($login, $pass); }
                    catch (Exception $e) {
                        
                        if($e->getMessage() == 'Err_BadCredentials') {                             
                            echo "<div class=\"notification alert alert-danger\" role=\"alert\">Error : Wrong User/Password combination ! Please try again.</div>"; }
                        
                        else if ($e->getMessage() == 'Err_UnknownUsername') {
                            echo "<div class=\"notification alert alert-danger\" role=\"alert\">Error : Unknown Username ! Please try again.</div>"; }
                        
                    }
                
                return $user;                
            }
            
            // Else, if the Insertion failed => Throw Exception
            else {
            
                //echo "<br /><div class=\"notification alert alert-danger\" role=\"alert\">Error : Registering failed ! Please try again or contact us.</div>";
                throw new Exception('Err_RegisterFail');
                
            }
            
        }
    }
    
    /* ----- ----- ----- Functions ----- ----- ----- */

    /**
     * { DESCRIPTION }
     * @param _ _
     * @return _ _
     */
    public function disconnect(){
        
        $this->status = 0;
        
    }
    
    /**
     * { DESCRIPTION }
     * @return bool $status
     */
    public function getStatus() {
        
        return $this->status;
    }
    
    /**
     * { DESCRIPTION }
     * @return string $admin
     */
    public function getAdmin() {
        
        return $this->admin;
    }
    
    /**
     * { DESCRIPTION }
     * @return string $username
     */
    public function getUsername() {
        
        return $this->username;
    }
    
    /**
     * { DESCRIPTION }
     * @return string $username
     */
    public function getID() {
        
        return $this->id;
    }

    
}


// on évitera de fermer la balise php pour ne pas injecter de caratères invible sur les pages parentes