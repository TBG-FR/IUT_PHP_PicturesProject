<!doctype html>

<html lang="fr">
    
<head>
  <meta charset="utf-8">

  <title>PHP - TP1 - Ex3</title>
  <meta name="description" content="PHP - TP1 - Ex3">
  <meta name="author" content="Tom-Brian Garcia (p1520325)">

  <link rel="stylesheet" href="styles.css">
</head>

<body>
    
    <?php echo "PHP Test : Working ?";
    /*         
      foreach ($_POST as $champ => $valeur)
          echo $champ.' --- '.$valeur.'<br />';
        print_r($_POST);
    */
    ?>
    
     <br /><br /><br /> 
    
    <!-- Début du Tableau --><h1>Tab2 - "Automatique"/Dynamique</h1>
    <table>
        
        <tr class="tab_header"> <!-- Ligne 0 du Tableau -->
            <th>Champ</th> <!-- Colonne 1 -->
            <th>Contenu</th> <!-- Colonne 2 -->           
        </tr>
        
        <?php
            $i = 0;
            foreach ($_POST as $champ => $valeur) {          
                echo '<tr class="tab_';
        
                if($i%2==0) {echo 'pair';}
                else {echo 'impair';};
        
                echo '"> <!-- Ligne '.$i.' du Tableau -->
                        <th>'.ucfirst($champ).'</th> <!-- Colonne 1 -->
                        <th>'. stripslashes($valeur).'</th> <!-- Colonne 2 -->
                    </tr>';
                $i++;
            };
        ?>
        
                
    </table> <!-- Fin du Tableau -->
    
</body>
    
</html>