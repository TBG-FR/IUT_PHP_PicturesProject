<!doctype html>

<html lang="fr">
    
<head>
  <meta charset="utf-8">

  <title>PHP - TP1 - Ex2</title>
  <meta name="description" content="PHP - TP1 - Ex2">
  <meta name="author" content="Tom-Brian Garcia (p1520325)">

  <link rel="stylesheet" href="css/styles.css">
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
    
    <!-- Début du Tableau --><h1>Tab1 - "Manuel"/Statique</h1>
    <table>
    
        <tr> <!-- Ligne 1 du Tableau -->
            <th>Texte</th> <!-- Colonne 1 -->
            <th><?php echo stripslashes($_POST["texte"]) ?></th> <!-- Colonne 2 -->
        </tr> 
    
        <tr> <!-- Ligne 2 du Tableau -->
            <th>Mot de Passe</th> <!-- Colonne 1 -->
            <th><?php echo stripslashes($_POST["passe"]) ?></th> <!-- Colonne 2 -->
        </tr> 
    
        <tr> <!-- Ligne 3 du Tableau -->
            <th>Choix</th> <!-- Colonne 1 -->
            <th><?php echo stripslashes($_POST["choix"]) ?></th> <!-- Colonne 2 -->
        </tr>
    
        <tr> <!-- Ligne 4 du Tableau -->
            <th>Genre</th> <!-- Colonne 1 -->
            <th><?php echo stripslashes($_POST["genre"]) ?></th> <!-- Colonne 2 -->
        </tr>
        
    </table> <!-- Fin du Tableau -->
    
     <br /><br /><br /> 
    
    <!-- Début du Tableau --><h1>Tab2 - "Automatique"/Dynamique</h1>
    <table>
        
        <?php
            $i = 0;
            foreach ($_POST as $champ => $valeur)           
                echo '<tr> <!-- Ligne '.$i.' du Tableau -->
                        <th>'.ucfirst($champ).'</th> <!-- Colonne 1 -->
                        <th>'. stripslashes($valeur).'</th> <!-- Colonne 2 -->
                    </tr>';
                $i++;
        ?>
        
                
    </table> <!-- Fin du Tableau -->
    
</body>
    
</html>