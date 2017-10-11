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

    if(session_destroy()) { echo "<p class='success'>Déconnexion effectuée !</p>" ; }
    else { echo "<p class='error'>La Déconnexion semble avoir échoué... !</p>" ; }
    
    echo "
        <p class='important'> ==> <a href=\"index.php\">Cliquez ici pour revenir à l'accueil</a> <== </p>";
    
    ?>
    
    
    
</body>
    
</html>