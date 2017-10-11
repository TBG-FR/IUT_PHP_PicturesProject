<?php

session_start();    /* Création/Récupération de la Session */

require_once("params.inc.php"); /* Fichier 'BDD' */

?>

<!doctype html>

<html lang="fr">
    
<head>
  <meta charset="utf-8">

  <title>PHP - TP2 - Ex2</title>
  <meta name="description" content="PHP - TP2 - Ex2">
  <meta name="author" content="Tom-Brian Garcia (p1520325)">

  <link href="style.css" rel="stylesheet" media="all" type="text/css">
</head>

<body>
    
    <!-- TESTS BDD Class  -->
    
    <?php
    
    //test->BDDreq($action, $column, $table, $condition));
    $test = new BDDreq("SELECT", "*", "Personne", "");
    
   print_r($test); 
    
    $i = 0;
    foreach($test as $key => $value) {

        echo '<tr class="tab_';
        
                if($i%2==0) {echo 'pair';}
                else {echo 'impair';};
        
                echo '"> <!-- Ligne '.$i.' du Tableau -->
            <th>'.$key.$value.'</th> <!-- Colonne 1 -->
            <th>'.$key[0].$value[0].'</th> <!-- Colonne 2 -->
            <th>'.$key[1].$value[1].'</th> <!-- Colonne 2 -->
            <th>'.$key[2].$value[2].'</th> <!-- Colonne 3 -->
            <th>'.$key[3].$value[3].'</th> <!-- Colonne 4 -->
        </tr>';
        
        $i++;
    }
    
    ?>
    
</body>
    
</html>