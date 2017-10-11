<?php       // File "various.inc.php" : Various functions (utilities)

/*
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
        // ALTERNATIVE : $bdd->query('SET NAMES UTF8');
        
        // Instanciation
        $pdo = new PDO($dsn, $user, $password);
        
        return $pdo;
    }
    catch (PDOException $e) {
        die("Erreur Connexion BDD : " . $e->getMessage());
    }
}
*/

function var_secure($string) {
    
    // If the type of the string is an Integer (int)
		if(ctype_digit($string))
		{
			$string = intval($string);
		}
		// For all other types
		else
		{
			$string = mysql_real_escape_string($string); // deprecated, to remplace (with PDO::quote ? filter_input ?)
			$string = addcslashes($string, '%_');
            $string = htmlEntities($string, ENT_QUOTES);
		}
		
		return $string;
}

?>