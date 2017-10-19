<?php

    require_once('conf.bdd.php');

/**
 * Class User
 * {DESCRIPTION}
 */
class User
{

    /* ----- ----- ----- Attributes ----- ----- ----- */

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
     * @var bool : Determines if the user is an Administrator
     */
    private $admin;

    /**
     * @var bool : Determines if the user is Logged (TRUE) or not (FALSE)
     */
    private $status;

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
            'fields' => array('id', 'username', 'password', 'admin'), // get id, username and password
        ));

        if( empty($req) == FALSE) { 

            if( $req[0]['password'] == $db->hash($pass) ) {
                
                $user = New User();
                $user->id = $req[0]['id'];
                $user->username = $req[0]['username'];
                $user->password = $db->hash($req[0]['password']);
                $user->admin = $req[0]['admin'];
                $user->status = TRUE;

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

        var_dump($req);

    }

    /**
     * User constructor by Registration
     * @param string $login
     * @param string $pass
     */
    public static function constructByRegister($login, $pass, $pass_v, $f_name, $l_name) {
        
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
            
            // Normally, we would use the "save()" method from "Database" class here, but it doesn't work... [+ $db->hash($pass) ]
            $hash = $db->hash($pass);
            $up = $db->query("INSERT INTO $bdd_table_user (username, password, admin) VALUES ('$login', '$hash', '0')", array(), TRUE);
            
            // Normally, this part would be unnecessary, we would just check if $up return TRUE            
            $req = $db->read($bdd_table_user, array(
                'conditions' => array(
                    'username LIKE' => "$login" // Check if there is an entry with the same username
                ),
                'fields' => array('id', 'username'), // get result (id, username)
            ));
            
            // If the Insertion succeeded => Display a success message and add those values into the User instance created
            //if($up) {
            if( empty($req) == FALSE ) {
                
                echo "<div class=\"notification alert alert-success\" role=\"alert\">You've been succesfully registered !</div><br />";
                
                //Then try to log the User, the same way as if he logged himself with the Login form (with Exceptions management, even if it shouldn't happen just after registering)           
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
            
                //echo "<br /><div class=\"notification alert alert-danger\" role=\"alert\">Error : Registering failed ! Please try again.</div>";
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
        echo " DISCONNECT (ADD DECONSTRUCTOR)";
        
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
     * @return string $username
     */
    public function getUsername() {
        
        return $this->username;
    }

    
    /* ----- ----- ----- OTHER _ REMOVE ----- ----- ----- */
//    
//    /**
//     * pour filtrer les données en encodant les caractères interprétables
//     * @param array $datas
//     * @return array
//     */
//    private function filtre($datas){
//        foreach ($datas as $k => $data){
//            $datas[$k] = htmlspecialchars($data);
//        }
//        return $datas;
//    }
//
//    /**
//     * @param string $password
//     * @return string hashed
//     */
//    //private function hash($password){ //***MODIF_PROJECT***
//    public function hash($password){
//        // on choisira ici la méthode de cryptage de mot de passe
//        //return md5($password);
//        $options = array(
//            'salt' => 'Zbk6s2i!!?vs+_tM2-&-=mvTpW4ReC945VH64Vb9&7$+R2UxW6Gb!@6eH#7P' // on choisi un code pour que l'algo de cryptage soit réversible
//        );
//        return password_hash($password, CRYPT_BLOWFISH, $options);
//        /* PASSWORD_BCRYPT ? */
//
//    }
//
//    /**
//     * une fonction intermédiaire qui formate les conditions d'un select
//     * @param array $data
//     * @return array
//     */
//    private function conditions($data){
//        $condition = "";
//        $values = array();
//        if(count($data) > 0){
//            foreach ($data as $key => $value){
//                if($key == "password"){
//                    $value = $this->hash($value); // si le mot de passe est recherché il faut chercher le mot de passe crypté
//                }
//                if($condition != ""){
//                    $condition .= " AND ";
//                }
//                $operateur = explode(" ", $key); // gestion des opérateurs dans les conditions : <= >= != <> LIKE
//                if(isset($operateur[1])){
//                    $condition .= $operateur[0] . " " . $operateur[1] . " ? ";
//                }else{
//                    $condition .= $operateur[0] . " = ? ";
//                }
//                $values[] = $value;
//            }
//        }
//        return array('condition' => $condition, 'values' => $values);
//    }
//
//    /**
//     * Si les champs created et/ou updated sont présents dans la table, on les remplira automatiquement
//     * @param string $table la table à tester
//     * @param bool $create
//     * @return array
//     */
//    private function setDate($table, $create = false){
//        $data = array();
//        if($create){
//            $list = $this->query("SHOW COLUMNS FROM $table WHERE field = 'created'");
//            if(count($list) > 0){
//                $data['created'] =  date("Y-m-d H:i:s");
//            }
//        }
//        $list = $this->query("SHOW COLUMNS FROM $table WHERE field = 'updated'");
//        if(count($list) > 0){
//            $data['updated'] =  date("Y-m-d H:i:s");
//        }
//        return $data;
//    }
//
//    /**
//     * initialise PDO si l'instance n'est pas créé, retourne l'instance si elle est déjà créé
//     * @return PDO
//     */
//    private function getPdo()
//    {
//        if($this->pdo === null){
//            try{
//                $this->pdo = new PDO("mysql:host={$this->dbhost};port=3306;dbname={$this->dbname}", $this->dbuser, $this->dbpass);
//            }catch (PDOException $e){
//                die("Erreur : " . $e->getMessage());
//            }
//        }
//        return $this->pdo;
//    }
//
//    /**
//     * execute une requète sql en mode préparé
//     * @param string $query la requète à exécuter
//     * @param array $values les valeurs à injecter dans la requète préparé
//     * @param bool $one si on souhaite un seul résultat
//     * @return array|boolean|object en fonction du type de résultat généré par la requète
//     */
//    public function query($query, $values = array(), $one = false){
//        $req = $this->getPdo()->prepare($query);
//        $req->execute($values);
//        //$req->setFetchMode(PDO::FETCH_OBJ); //**MODIF_PROJ***
//        //$req->setFetchMode(PDO::FETCH_BOTH);
//        $req->setFetchMode(PDO::FETCH_ASSOC);
//        if(is_bool($req)){
//            return $req;
//        }
//        if($one){
//            return $req->fetch();
//        }else{
//            return $req->fetchAll();
//        }
//    }
//
//    /**
//     * lire des données d'une $table en indiquant une série d'options au format d'un tableau (voir structure tableau $default)
//     * @param string $table
//     * @param array $options
//     * @param bool $one
//     * @return array|bool|object les résultats de la requète de recherche
//     */
//    public function read($table, $options = array(), $one = false){
//        // on détermine un tableau de valeur par défaut pour éviter les test d'existance d'index
//        $default = array(
//            "conditions" => array(), // exemple : array("champ" => "valeur") correspond à WHERE champ='valeur'
//            "fields" => array(), // exemple : array('col1', 'col2', 'col6') correspond à SELECT col1,col2,col6 FROM ...
//            "limit" => null, // exemple : 10 correspond à LIMIT 10
//            "offset" => 0, // ne fonctionne que si limit est défini, en donnant une valeur numérique, correspondra à l'offset de départ
//            "order" => array() // exemple : array('col5', 'col7 DESC') correspond à ORDER BY col5, col7 DESC
//        );
//        $options = array_replace($default, $options); // on fusionne les options avec le tableau par défaut
//        $condition = $this->conditions($options['conditions']);
//
//        // on crée la chaine des champs à selectionner
//        if(count($options['fields']) > 0){
//            $fields = implode(',', $options['fields']);
//        }else{
//            $fields = "*";
//        }
//
//        $req = "SELECT " . $fields . " FROM " . $table;
//        if($condition['condition'] != ""){
//            $req .= " WHERE " . $condition['condition'];
//        }
//
//        // on crée la chaine pour le ORDER BY
//        if(count($options['order'])> 0){
//            $req .= " ORDER BY " . implode(', ', $options['order']);
//        }
//
//        // on ajoute la limite de la requète
//        if($options['limit']){
//            $req .= " LIMIT " . $options['offset'] . ", " . $options['limit'];
//        }
//
//        // on retourne le tableau des résultats
//        return $this->query($req, $condition['values'], $one);
//    }
//
//    /**
//     * ajoute des données dans la table (si l'id est défini dans $datas alors la requète fera un UPDATE
//     * @param string $table le nom de la table
//     * @param array $datas un tableau des valeurs à ajouter ex: array('col1' => 'val1', 'col2' => 'val2', 'col3' => 'val3', ...)
//     * @return bool
//     */
//    public function save($table, $datas){
//        if(count($datas) == 0){
//            return false;
//        }
//        $datas = $this->filtre($datas);
//        if(isset($datas['id']) && is_numeric($datas['id'])){
//            $id = $datas['id'];
//            unset($datas['id']);
//        }
//        if(isset($datas['password'])){ // on crypte le mot de passe si il fait parti des données
//            $datas['password'] = $this->hash($datas['password']);
//        }
//        $datas = array_merge($datas, $this->setDate($table, !isset($id))); // on appelle la méthode qui vérifie pour compléter les dates created/updated
//        $keys = array_keys($datas);
//        $values = substr(str_repeat('?,',count($keys)),0,-1);
//        if(isset($id)){ // si l'id existe on va faire une mise à jour
//            $fields = implode('=?, ',$keys);
//            $req = "UPDATE " . $table . " SET $fields=? WHERE id=" . $id;
//        }else{ // sinon on fait une insertion
//            $fields = implode(', ',$keys);
//            $req = "INSERT INTO " . $table . " ($fields) VALUES ($values)";
//        }
//        return $this->query($req, array_values($datas));
//    }
//
//    /**
//     * supprime un élément de la table dont l'id est $id
//     * @param string $table le nom de la table
//     * @param int $id l'id de l'élément à supprimer
//     * @return bool
//     */
//    public function delete($table, $id){
//        if(is_numeric($id)) {
//            $req = "DELETE FROM " . $table . " WHERE id=" . $id;
//            return $this->getPdo()->exec($req) == 1;
//        }
//        return false;
//    }
//
//    /**
//     * Méthode pour faire un UPDATE sur une table
//     * @todo cette méthode n'est pas optimale, il faudra revoir sa conception pour éviter de réaliser une boucle
//     * @param string $table
//     * @param array $datas
//     * @param array $conditions
//     * @return bool|int le nombre de champs concernés
//     */
//    public function update($table, $datas, $conditions){
//        $search = $this->read($table, $conditions); // on vérifie si il y a des correspondances dans la table selon les conditions demandées
//        if(!$search){
//            return false; // retourne false si aucun résultat
//        }
//        $cpt = 0;
//        foreach ($search as $key => $value){
//            $cpt++;
//            $datas = array_merge($datas, $this->setDate($table)); // on appelle la méthode qui vérifie pour compléter les dates created/updated
//            $datas["id"] = $value->id;
//            $this->save($table, $datas); // met à jour chaque élément trouvé dans le $search
//        }
//        return $cpt;
//    }
    
    
}


// on évitera de fermer la balise php pour ne pas injecter de caratères invible sur les pages parentes