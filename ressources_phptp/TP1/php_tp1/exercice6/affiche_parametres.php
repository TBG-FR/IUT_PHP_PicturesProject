<?php session_start(); 

/* Fonction pour enlever les espaces */
function StripExtraSpace($s)
{
   $newstr = "";
   for($i = 0; $i < strlen($s); $i++)
      {
      $newstr = $newstr . substr($s, $i, 1);
      if(substr($s, $i, 1) == ' ')
         while(substr($s, $i + 1, 1) == ' ')
            $i++;
      }
   return $newstr;
}

?>

<html lang="fr">

    <head>
        <meta charset="utf-8">

        <title>PHP - TP1 - Ex6</title>
        <meta name="description" content="PHP - TP1 - Ex6">
        <meta name="author" content="Tom-Brian Garcia (p1520325)">

        <link rel="stylesheet" href="styles.css">
    </head>

    <body>

        <?php echo "PHP Test : Working ?"; ?>       
        

        <br /><br /><br /> 

        <!-- Début du Tableau --><h1>Tab2 - "Automatique"/Dynamique</h1>
        <table>

            <tr class="tab_header"> <!-- Ligne 'Header' du Tableau -->
                <th>Champ</th> <!-- Colonne 1 -->
                <th>Contenu</th> <!-- Colonne 2 -->           
            </tr>

            <?php
            $i = 0;
            /* Parcourir le Tableau $_POST */
            foreach ($_POST as $champ => $valeur) {
                
                /*Ajout de la valeur dans $_SESSION[clé] */
                $_SESSION["$champ"]=$valeur;
                
                /* IF_1 : Si la valeur est un Tableau */
                if(is_array($valeur)==true)
                {
                    /* Parcourir le Tableau $valeur */
                    foreach ($valeur as $newval) {           
                        echo '<tr class="tab_'; /* Code HTML Table - Part.1 */
                        
                        /* Code HTML Table - Part.2 */
                        /* Détermine si i est pair/impair pour attribuer le CSS */
                        if($i%2==0) {echo 'pair';}
                        else {echo 'impair';}  
                        
                        /* Code HTML Table - Part.3 */
                        echo '"> <!-- Ligne '.$i.' du Tableau -->
                        <th>'.ucfirst($champ).'</th> <!-- Colonne 1 -->
                        <th>'. stripslashes($newval).'</th> <!-- Colonne 2 -->
                    </tr>';

                        $i++;
                    }

                }
                
                /* IF_1 : Sinon (si c'est une valeur "seule") */
                else
                {
                    echo '<tr class="tab_'; /* Code HTML Table - Part.1 */
                    
                    /* Code HTML Table - Part.2 */
                    /* Détermine si i est pair/impair pour attribuer le CSS */
                    if($i%2==0) {echo 'pair';}
                    else {echo 'impair';}
                    
                    /* Code HTML Table - Part.3 */
                    echo '"> <!-- Ligne '.$i.' du Tableau -->
                        <th>'.ucfirst($champ).'</th> <!-- Colonne 1 -->
                        <th>'. stripslashes($valeur).'</th> <!-- Colonne 2 -->
                    </tr>';

                    $i++;
                }

            };
            ?>


        </table> <!-- Fin du Tableau -->
        
        
<?php /* TEMP - Affichage de $_SESSION */
        
foreach ($_SESSION as $cle => $valeur) {
    
    
    
    if(is_array($valeur)==true) {foreach($valeur as $newval)
        {echo '['.$cle.'] : ['.$newval.'] <br />';}}
    else {echo '['.$cle.'] : ['.$valeur.'] <br />';}
    
    }
?>

    </body>

</html>