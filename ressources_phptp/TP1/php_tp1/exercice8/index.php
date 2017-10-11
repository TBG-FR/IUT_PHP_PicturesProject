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

  <title>PHP - TP1 - Ex8</title>
  <meta name="description" content="PHP - TP1 - Ex8">
  <meta name="author" content="Tom-Brian Garcia (p1520325)">

  <link href="style.css" rel="stylesheet" media="all" type="text/css">

        <style>
            html {
                background-color: <?php if(isset($_COOKIE["colors"]["bg"])==true){if(is_string($_COOKIE["colors"]["bg"])==true) {echo StripExtraSpace($_COOKIE["colors"]["bg"]);}} ?>;
                color: <?php if(isset($_COOKIE["colors"]["txt"])==true){if(is_string($_COOKIE["colors"]["txt"])==true) {echo StripExtraSpace($_COOKIE["colors"]["txt"]);}} ?>;
            }
        </style>
    
</head>

<body>
    
    <!-- Début du Formulaire -->
    <form action="affiche_parametres.php" method="post">
        
        <!-- Zone de Texte -->
        Texte :
        
        <input type="text" name="texte" value="<?php /* Si la valeur existe dans SESSION => Si SESSION[texte] contient du texte, le mettre dans le champ */
            if(array_key_exists('texte', $_SESSION)==true){if(is_string($_SESSION["texte"])==true) {echo $_SESSION["texte"];}} ?>" required> <br />
        
        <!-- Zone 'Mot de Passe' -->
        Mot de Passe :
        
        <input type="password" name="passe" value="<?php /* Si la valeur existe dans SESSION => Si SESSION[passe] contient du texte, le mettre dans le champ */
            if(array_key_exists('passe', $_SESSION)==true){if(is_string($_SESSION["passe"])==true) {echo $_SESSION["passe"];}} ?>" required> <br />
        
        <!-- Zone Liste Déroulante -->
        Choix :
        
        <select name="choix[]" multiple> <!-- Début de la Liste Déroulante -->
            <option value="choix1"
                    <?php /* Si la valeur existe dans SESSION => Si choix est un Tableau => Si le Tableau 'choix' contient la valeur 'choix1', la sélectionner */
                    if(array_key_exists('choix', $_SESSION)==true){if(is_array($_SESSION["choix"])==true){if(in_array("choix1",$_SESSION["choix"])==true) {echo 'selected';}}} ?>
            >Choix #1</option>
            
            <option value="choix2"
                    <?php /* Si la valeur existe dans SESSION => Si choix est un Tableau => Si le Tableau 'choix' contient la valeur 'choix1', la sélectionner */
                    if(array_key_exists('choix', $_SESSION)==true){if(is_array($_SESSION["choix"])==true){if(in_array("choix2",$_SESSION["choix"])==true) {echo 'selected';}}} ?>
            >Choix #2</option>
            
            <option value="choix3"
                    <?php /* Si la valeur existe dans SESSION => Si choix est un Tableau => Si le Tableau 'choix' contient la valeur 'choix1', la sélectionner */
                    if(array_key_exists('choix', $_SESSION)==true){if(is_array($_SESSION["choix"])==true){if(in_array("choix3",$_SESSION["choix"])==true) {echo 'selected';}}} ?>
            >Choix #3</option>
            
            <option value="choix4"
                    <?php /* Si la valeur existe dans SESSION => Si choix est un Tableau => Si le Tableau 'choix' contient la valeur 'choix1', la sélectionner */
                    if(array_key_exists('choix', $_SESSION)==true){if(is_array($_SESSION["choix"])==true){if(in_array("choix4",$_SESSION["choix"])==true) {echo 'selected';}}} ?>
            >Choix #4</option>
            
        </select> <br /> <!-- Fin de la Liste Déroulante -->
        
        <!-- Boutons 'Radio' -->
        Genre :
        
        <input type="radio" name="genre" value="NC" 
             <?php /* Si la valeur existe dans SESSION => Si genre contient du texte => Si SESSION[genre] contient 'NC', le cocher */
               if(array_key_exists('genre', $_SESSION)==true){if(is_string($_SESSION["genre"])==true) {if($_SESSION["genre"]=='NC') {echo 'checked';}}} ?>  
        > NC
        
        <input type="radio" name="genre" value="homme"
               <?php /* Si la valeur existe dans SESSION => Si genre contient du texte => Si SESSION[genre] contient 'homme', le cocher */
               if(array_key_exists('genre', $_SESSION)==true){if(is_string($_SESSION["genre"])==true) {if($_SESSION["genre"]=='homme') {echo 'checked';}}} ?>
        > Homme
        
        <input type="radio" name="genre" value="femme"
               <?php /* Si la valeur existe dans SESSION => Si genre contient du texte => Si SESSION[genre] contient 'femme', le cocher */
               if(array_key_exists('genre', $_SESSION)==true){if(is_string($_SESSION["genre"])==true) {if($_SESSION["genre"]=='femme') {echo 'checked';}}} ?>
        > Femme
        
        <br />
        
        <!-- Checkboxes -->
        Animaux possédés :
        
        <input type="checkbox" name="animal[]" value="chien"
                    <?php /* Si la valeur existe dans SESSION => Si animal est un Tableau => Si le Tableau 'animal' contient la valeur 'chien', la sélectionner */
                    if(array_key_exists('animal', $_SESSION)==true){if(is_array($_SESSION["animal"])==true){if(in_array("chien",$_SESSION["animal"])==true) {echo 'checked';}}} ?>
        > Chien
        
        <input type="checkbox" name="animal[]" value="chat"
                    <?php /* Si la valeur existe dans SESSION => Si animal est un Tableau => Si le Tableau 'animal' contient la valeur 'chat', la sélectionner */
                    if(array_key_exists('animal', $_SESSION)==true){if(is_array($_SESSION["animal"])==true){if(in_array("chat",$_SESSION["animal"])==true) {echo 'checked';}}} ?>
        > Chat
        
        <input type="checkbox" name="animal[]" value="poney"
                    <?php /* Si la valeur existe dans SESSION => Si animal est un Tableau => Si le Tableau 'animal' contient la valeur 'poney', la sélectionner */
                    if(array_key_exists('animal', $_SESSION)==true){if(is_array($_SESSION["animal"])==true){if(in_array("poney",$_SESSION["animal"])==true) {echo 'checked';}}} ?>
        > Poney
        
        <input type="checkbox" name="animal[]" value="étalon"
                    <?php /* Si la valeur existe dans SESSION => Si animal est un Tableau => Si le Tableau 'animal' contient la valeur 'étalon', la sélectionner */
                    if(array_key_exists('animal', $_SESSION)==true){if(is_array($_SESSION["animal"])==true){if(in_array("étalon",$_SESSION["animal"])==true) {echo 'checked';}}} ?>
        > Étalon
        <br />
        
        <!-- Zone de Texte : Couleur du Fond -->
        Couleur du Fond :
        
        <input type="text" name="bg_color" value="<?php /* Si la valeur existe dans SESSION => Si SESSION[texte] contient du texte, le mettre dans le champ */
            if(isset($_COOKIE["colors"]["bg"])==true){if(is_string($_COOKIE["colors"]["bg"])==true) {echo StripExtraSpace($_COOKIE["colors"]["bg"]);}} else echo "#FFFFFF"; ?>" required> <br />
        
        <!-- Zone de Texte : Couleur du Texte -->
        Couleur du Texte :
        
        <input type="text" name="txt_color" value="<?php /* Si la valeur existe dans SESSION => Si SESSION[texte] contient du texte, le mettre dans le champ */
            if(isset($_COOKIE["colors"]["txt"])==true){if(is_string($_COOKIE["colors"]["txt"])==true) {echo StripExtraSpace($_COOKIE["colors"]["txt"]);}} else echo "#000000"; ?>" required> <br />
        
        <!-- Reset -->
        <input type="reset" value="Réinitialiser" action="<?php /* NOT WORKING unset($_SESSION);*/ ?>" >
        
        <!-- Submit -->
        <input type="submit" value="Envoyer">
        
    </form> <!-- Fin du Formulaire -->
    
</body>
    
</html>