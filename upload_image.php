<?php

if ($_FILES['pic']['error'] > 0) $erreur = "Erreur lors du transfert";
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
$extension_upload = strtolower(  substr(  strrchr($_FILES['pic']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) );


$resultat = move_uploaded_file($_FILES['pic']['tmp_name'],"public_images/{$_POST['pic_name']}.{$extension_upload}");

if ($resultat);

$img="public_images/{$_POST['pic_name']}.{$extension_upload}";
echo "<img src='$img' alt='texte alternatif' height='150px' />";



?>
<form  action="gallery.php" method="post">
         <input type="text" name="pic_name" value=/>
         <input type="file" name="pic" />
         <input type="submit" value="Envoyer" />
      </form>