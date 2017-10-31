<?php

require_once("classes/all.inc.php");

$pic= new Picture();

if($pic->addImage($_FILES['pic']['name'],$_FILES['pic']['error'],$_FILES['pic']['tmp_name'])) {
    
    $img="public_images/{$_FILES['pic']['name']}";
    
    echo "<img src='$img' alt='texte alternatif' height='150px' >";
    
    echo "<form  action='save_pic_db.php' method='post'>
    
    <br/> Nom du fichier : <br/> <input type='text' name='pic_name' value={$_FILES['pic']['name']} >
    <br/> Description : <br/> <input type='text' name='pic_desc'>
    <br/> Date (DD/MM/YYYY) : <br/> <input type='text' name='pic_date'> <br/>
    <br/> Kewords (comma separated) : <br/> <input type='text' name='pic_keywords'> <br/>
    
    <input type='submit' value='Envoyer' >
    
    </form>";
    
}




?>