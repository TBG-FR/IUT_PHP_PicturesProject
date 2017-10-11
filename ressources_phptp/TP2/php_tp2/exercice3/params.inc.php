<?php       // Fichier "params.inc.php" : Connexion BDD

$host="localhost";
$user="p1520325";
$password="11520325";
$dbname="p1520325";

function BDD_Connect()
{

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

?>