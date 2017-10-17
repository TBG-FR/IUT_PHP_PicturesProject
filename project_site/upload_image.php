
<?php

require_once("classes/all.inc.php");

$pic= new Picture();

if($pic->addImage($_FILES['pic']['name'],$_FILES['pic']['error'],$_FILES['pic']['tmp_name'])) {
    
    $img="public_images/{$_FILES['pic']['name']}";
    echo "<img src='$img' alt='texte alternatif' height='150px' >";
    echo "<form  action='gallery.php' method='post'>
    Nom du fichier <br/> <input type='text' name='pic_name' value={$_FILES['pic']['name']} >
    Description <br/> <input type='text' name='pic_desc'>
    Date <br/> <input type='text' name='pic_date'>
    <input type='submit' value='Envoyer' >
    </form>";
    
}




?>
