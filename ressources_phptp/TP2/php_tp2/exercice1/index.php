<?php

/* include_once("fichier"); */
require_once("params.inc.php");

?>

<!doctype html>

<html lang="fr">
    
<head>
  <meta charset="utf-8">

  <title>PHP - TP1 - Ex1</title>
  <meta name="description" content="PHP - TP1 - Ex1">
  <meta name="author" content="Tom-Brian Garcia (p1520325)">

  <link rel="stylesheet" href="styles.css">

</head>

<body>
    <table>
    
    <tr class="tab_header"> <!-- Ligne 'Header' du Tableau -->
        <th>ID</th> <!-- Colonne 1 -->
        <th>User</th> <!-- Colonne 2 -->
        <th>Pass</th> <!-- Colonne 3 -->
        <th>Color</th> <!-- Colonne 4 -->
    </tr>
    
    <?php
    $pdo=BDD_Connect();

    $req=$pdo->query("SELECT * FROM Personne");
    $i=0;
        
        /* IF req != NULL (ou vide) */

    foreach($req as $row) {

        echo '<tr class="tab_';
        
                if($i%2==0) {echo 'pair';}
                else {echo 'impair';};
        
                echo '"> <!-- Ligne '.$i.' du Tableau -->
            <th>'.$row[0].'</th> <!-- Colonne 1 -->
            <th>'.$row[1].'</th> <!-- Colonne 2 -->
            <th>'.$row[2].'</th> <!-- Colonne 3 -->
            <th>'.$row[3].'</th> <!-- Colonne 4 -->
        </tr>';
        
        $i++;
    }

    $pdo = NULL;
    ?>
    
    </table>
</body>
    
</html>