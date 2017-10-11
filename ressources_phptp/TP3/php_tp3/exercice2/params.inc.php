<?php       // Fichier "params.inc.php" pour la Connexion BDD

$host="localhost";
$user="p1520325";
$password="11520325";
$dbname="p1520325";

/* Fonction permettant d'établir la connexion avec la Base de Données */
function BDD_Connect() {

global $host;
global $user;
global $password;
global $dbname;
    
    try {
        // Data Source Name
        $dsn ="mysql:host=$host;port=3306;dbname=$dbname;charset=utf8";
        /* ALTERNATIVE : $bdd->query('SET NAMES UTF8'); */
        
        // Instanciation
        $pdo = new PDO($dsn, $user, $password);
        
        return $pdo;
    }
    catch (PDOException $e) {
        die("Erreur Connexion BDD : " . $e->getMessage());
    }
}
    
/* Fonction permettant de sécuriser les variables (injections SQL, code HTML, Injection XSS simple) */
function securite_bdd($string) {
    
    // On regarde si le type de string est un nombre entier (int)
		if(ctype_digit($string))
		{
			$string = intval($string);
		}
		// Pour tous les autres types
		else
		{
			$string = mysql_real_escape_string($string); // déprécié, à remplacer (avec PDO::quote ?)
			$string = addcslashes($string, '%_');
		}
		
		return $string;
}

class BDDreq {
    
    /* ===== ===== ===== ===== ===== ===== ===== ===== CLASSE BDDreq : VARIABLES ===== ===== ===== ===== ===== ===== ===== ===== */
    
    private $req_Action = ""; // Exemple : "SELECT"
    private $req_Column = ""; // Exemple : "*" ou "Prénom"
    private $req_Table = ""; // Exemple : "Personne"
    private $req_Condition = ""; // Exemple : "Nom LIKE Jean" ou "ID = 1"
    private $requete = ""; /* Exemple : SELECT * FROM Personne WHERE ID = 1
                                    <==> [Action] [Column] FROM [Table] WHERE [Condition] */
    
    /* ===== ===== ===== ===== ===== ===== ===== ===== CLASSE BDDreq : METHODES ===== ===== ===== ===== ===== ===== ===== ===== */
        
    public function __construct($action, $column, $table, $condition) {
        
        /* TEMP */        
        echo "<br/>NEW [1] $action, $column, $table, $condition -- [Not_Set]";
        
        /* Vérification des variables "paramètres" et Transfert dans les variables "locales" à la classe */
        if($this->bind_Variables($action, $column, $table, $condition)) { /* do nothing */ }
        else { echo "VAR FALSE"; return FALSE; }
        
        /* TEMP */
        echo "<br/>NEW [2] $action, $column, $table, $condition -- [Not_Set]"; 

/*".isset($this->$req_Action).", ".isset($this->$req_Column).", ".isset($this->$req_Table).", ".isset($this->$req_Condition).", ".isset($this->$requete)." ";*/
        
        /* */
        if($this->make_Requete()) { /* do nothing */ }
        else { return FALSE; }
        
        /* TEMP */
        echo "<br/>NEW [3] $action, $column, $table, $condition -- [Not_Set]"; 
        
        return $this->requete;       
                
    }
    
    private function bind_Variables($act, $col, $tab, $cond) {
        
        /* Vérifie que l'on a bien SELECT/INSERT/UPDATE/etc */
        if(isset($act) && empty($act)==FALSE) { $this->req_Action = securite_bdd($act); }
        else { return FALSE; }
        
        /* Vérifie que l'on "vise" certaines des colonnes */
        if(isset($col) && empty($col)==FALSE) { $this->req_Column = securite_bdd($col); }
        else { return FALSE; } /* On pourrait ici mettre $column="*" mais ce ne serait pas très sécurisé
        
        /* Vérifie que l'on "vise" certaines des Tables (avec FROM)  */
        if(isset($tab) && empty($tab)==FALSE) { $this->req_Table = securite_bdd($tab); }
        else { return FALSE; }
        
        /* Vérifie si l'on a une condition, sinon n'en met aucun (WHERE)  */
        if(isset($cond) && empty($cond)==FALSE) { $this->req_Condition = securite_bdd($cond); }
        else { $this->req_Condition = ""; }
        
        return TRUE;
    
    }
    
    private function make_Requete() {
        
        /*if ($pdo == NULL || isset($pdo) == FALSE) { */
        $pdo = BDD_Connect(); /* Connexion  à la base de Données */ /*}*/
        
        // Création de la requête
        /*$requete = "$req_Action $req_Column 
        FROM $req_Table 
        WHERE  $req_Condition";*/
        
        
        
        // PREPARATION
//        $requete = $pdo->prepare(":action :column FROM :table WHERE :condition");
        $requete = $pdo->prepare("SELECT * FROM Personne WHERE 1=1");
        
        // LIAISON DES PARAMETRES
        
//        $this->requete->bindParam(':action', $this->req_Action);
//        $this->requete->bindParam(':column', $this->req_Column);
//        $this->requete->bindParam(':table', $this->req_Table);
//        $this->requete->bindParam(':condition', $this->req_Condition);
        
//        $this->requete->bindParam(':action', "SELECT");
//        $this->requete->bindParam(':column', "*");
//        $this->requete->bindParam(':table', "Personne");
//        $this->requete->bindParam(':condition', "1=1");
        
        // EXECUTION
        /*if($requete->execute()) { return $requete; }
        else { return FALSE; }*/
        
        //echo " $requete ";
        
        $requete->debugDumpParams(); /* TEMP */
        
        if($requete->execute()) {  echo "<p class='success'>Données récupérées ! <br /></p>"; }
            
            else { echo "<p class='error'>Données non récupérées ! <br /></p>"; }
        
        /* LIRE LES VALEURS DU RESULTAT */
        
        // liaison des données de sorties
         $requete->bindParam(1, $un);
         $requete->bindParam(2, $deux);
         $requete->bindParam(3, $trois);
         $requete->bindParam(4, $quatre);
        
        while ($row = $requete->fetch(PDO::FETCH_BOUND)) {
            
            echo " $un $deux $trois $quatre ";
            
        }
        
        $this->requete = $requete;
        return $requete;
        
    }
    
}

?>