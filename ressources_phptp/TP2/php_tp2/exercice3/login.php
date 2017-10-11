<?php session_start(); 

/* include_once("fichier"); */
require_once("params.inc.php");

?>

<!doctype html>

<html lang="fr">
    
<head>
  <meta charset="utf-8">

  <title>PHP - TP2 - Ex2</title>
  <meta name="description" content="PHP - TP2 - Ex2">
  <meta name="author" content="Tom-Brian Garcia (p1520325)">

  <link rel="stylesheet" href="styles.css">
</head>

<body>
    
    <?php /* echo "PHP Test : Working ? <br />";
             
      foreach ($_POST as $champ => $valeur)
          echo $champ.' --- '.$valeur.'<br />';
        print_r($_POST);
    
    */ ?>
    
     <br /><br /><br /> 
    
    <?php
    echo "<p>Bonjour ".htmlspecialchars($_POST['login'])." !<br />
                Merci de patienter, nous allons vérifier vos données...</p>";
    
    /* ----- Variables utilisées pour stocker les informations liées à l'identification ----- */
    $login=securite_bdd($_POST['login']);
    $adminlogin="TBG";
    $pass=securite_bdd($_POST['pass']);
    $correctlogin=FALSE;  
    $is_admin=FALSE;
    
    if( $login == $adminlogin ) { $is_admin=TRUE; }
    
    
    $pdo=BDD_Connect(); /* Connexion  à la base de Données */
    $req=$pdo->query("SELECT * FROM Personne"); /* SQL : récupérer le mot de passe */
    
    foreach($req as $row)
    {
    /*echo "<br />__.$row[0].__.$row[1].__.$row[2].__.$row[3].__";*/
    if( securite_bdd($row[1])==$login and securite_bdd($row[2])==$pass ) { $correctlogin=TRUE;}
    else { /* do nothing echo "TEST_WRONG";*/ }
    }
    
    /*print_r($correctlogin);
    echo "$correctlogin";
    echo "COMBI : $login -- $pass";*/
    
    if($correctlogin==TRUE and $is_admin==FALSE) /* Si le mot de passe BDD = le mot de passe entré */
        {
        
        echo "<p class='success'>Identification Effectuée ! <br /></p>";
        
        // PREPARATION
        $req = $pdo->prepare("SELECT * FROM Personne WHERE nom = :username");
        
        // LIAISON DES PARAMETRES
        $req->bindParam(':username', $login);
        
        // EXECUTION
        if($req->execute()) {
            
            echo "<p class='success'>Données récupérées ! <br /></p>";
                

        /* Affichage des Infos sous forme de Tableau */
            foreach($req as $row)
    {
        echo " <br />
        <table>
            <tr class=\"tab_header\"> <!-- Ligne 'Header' du Tableau -->
                <th>ID</th> <!-- Colonne 1 -->
                <th>Nom/Pseudo</th> <!-- Colonne 2 -->
                <th>Mot de Passe</th> <!-- Colonne 3 -->
                <th>Couleur</th> <!-- Colonne 4 -->
            </tr>
            
            <tr class=\"tab_pair\"> <!-- Ligne 1 du Tableau -->
                <th>".securite_bdd($row[0])."</th> <!-- Colonne 1 -->
                <th>".securite_bdd($row[1])."</th> <!-- Colonne 2 -->
                <th>".securite_bdd($row[2])."</th> <!-- Colonne 3 -->
                <th>".securite_bdd($row[3])."</th> <!-- Colonne 4 -->
            </tr>
        </table>
        "; /* Fin de l'affichage (Tableau) */
        }
            
            echo "<p class='error'> =>>> <a href='logout.php'>Déconnexion</a> <<<= <br />";
            
    }
        else { echo "<p class='error'>Erreur lors de l'affichage des informations...</p>"; }
        
    }
        
    else if($correctlogin==TRUE and $is_admin==TRUE) /* Si c'est l'Administrateur qui se connecte */
        {
        
        echo "<p class='success'>Identification Effectuée ! <br /></p>
            <p class='important'> /!\ Accès en tant qu'Administrateur /!\ <br /></p>";
        
       $req=$pdo->query("SELECT * FROM Personne");
    $i=0;
        
        /* IF req != NULL (ou vide) */
        
        /* Affichage des Infos sous forme de Tableau */
        
        echo " <br />
        <table>
            <tr class=\"tab_header\"> <!-- Ligne 'Header' du Tableau -->
                <th>ID</th> <!-- Colonne 1 -->
                <th>Nom/Pseudo</th> <!-- Colonne 2 -->
                <th>Mot de Passe</th> <!-- Colonne 3 -->
                <th>Couleur</th> <!-- Colonne 4 -->
            </tr>";

    foreach($req as $row) {

        echo '<tr class="tab_';
        
                if($i%2==0) {echo 'pair';}
                else {echo 'impair';};
        
                echo '"> <!-- Ligne '.$i.' du Tableau -->
            <th>'.htmlentities(securite_bdd($row[0])).'</th> <!-- Colonne 1 -->
            <th>'.htmlentities(securite_bdd($row[1])).'</th> <!-- Colonne 2 -->
            <th>'.htmlentities(securite_bdd($row[2])).'</th> <!-- Colonne 3 -->
            <th>'.htmlentities(securite_bdd($row[3])).'</th> <!-- Colonne 4 -->
        </tr>';
        
        $i++;
    }/* Fin de l'affichage (Tableau) */
        
        
        echo "
        </table>";
            
            echo "<p class='error'> =>>> <a href='logout.php'>Déconnexion</a> <<<= <br />";
            
    }
        
        
    
    else
    {
        echo "
        <p class='error'>Vous avez entré un nom d'utilisateur ou un mot de passe incorrect.<br />
        <a href=\"index.php\">    ==> Cliquez ici pour revenir à l'accueil <==    </a>
        </p>";
    }
    
    
    ?>
    
</body>
    
</html>