<?php

    require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start + Disconnection Management
    require_once("head.php");

// "Empty" picture creation
$pic= new Picture(-1,"","","",0,"",0);
var_dump($pic);
if(file_exists ("private_images/".$_FILES['pic']['name'])){
    $_SESSION['error']='alreadyexist';
    echo "<script type='text/javascript'>document.location.replace('add_picture.php');</script>";
}

if($pic->addImage($_FILES['pic']['name'],$_FILES['pic']['error'],$_FILES['pic']['tmp_name'])) {
    
    $img="private_images/{$_FILES['pic']['name']}";
    $filename = $_FILES['pic']['name'];
    
    echo "<img src='$img' alt='' height='150px' >";
    
    echo "<form  action='save_pic_db.php' method='post'>
    
    <br/> Filename : <br/> <input type='text' name='pic_name' placeholder='$filename' value='$filename' readonly >
    <br/> Title : <br/> <input type='text' name='pic_title' value='$filename' >
    <br/> Description : <br/> <input type='text' name='pic_desc' placeholder='Describe your picture here' > <br/>
    <br/> Date (DD/MM/YYYY) : <br/> <input type='text' name='pic_date'> <br/>
    <br/> Keywords (comma separated) : <br/> <input type='text' name='pic_keywords'> <br/>
    <br/> Watermark Color : <br/>    
        <select name='wtmk_color' size='2'>
            <option value='white'>White</option>
            <option value='black'>Black</option>
        </select>
    <br/>
    
    <input type='submit' value='Envoyer' >
    
    </form>";
    
}




?>