<?php

require_once("classes/all.inc.php");

$visible=true;

//construct($p_id, $p_title, $p_desc, $p_date, $p_public, $p_path, $p_state = 0)
$pic= new Picture($_POST["pic_ID"], $_POST["pic_title"], $_POST["pic_desc"], $_POST["pic_date"], $visible, $_POST["pic_name"]);
$keyword='';
$chain=$_POST["pic_keywords"].",";
while ($chain!=''){
    $keyword = strstr($chain, ',', true);
    $pic->addKeyword($keyword);
    //echo "{$keyword} done </br>";
    $chain=substr(strstr($chain, ','),1);
    //echo "{$chain} left </br> ";
}

//$pic->displayPicInfo();
$db=new Database();

var_dump($pic);

/*$req = $db->query("INSERT INTO phpproj_picture (id,title,description,date,public,path_original,path_watermarked) VALUES ({$pic->getId()},{$pic->getTitle()},{$pic->getDescription()},{$pic->getDate()},{$pic->getPublic()},{$path},{$path_watermarked})");*/
$res=$db->save("phpproj_picture", array(
        'id'=>$pic->getID(),
        'title'=>$pic->getTitle(),
        'description'=>$pic->getDesc(),
        'date'=>$pic->getDate(),
        'public'=>$pic->getPublic(),
        'path'=>$pic->getPath()
    ),FALSE);

//var_dump($pic);

//$db->isKeywordInDB('');
 $supprime = $db->query("Delete from phpproj_picturekeyword where pic_id={$pic->getID()}");

foreach ($pic->getKeywords() as &$value) {
    if(!$db->isKeywordInDB($value)){
        $res=$db->save("phpproj_keyword", array(
        'name'=>$value,
        'active'=>TRUE
        )); 
    }
    $res=$db->save("phpproj_picturekeyword", array(
        'pic_id'=>$pic->getId(),
        'key_id'=>$db->getKeywordId($value)
        ));
}

// Send the user back to the Picture Management & Unset his Galleries (in order to refresh it)
unset($_SESSION['private_gal']);
unset($_SESSION['public_gal']);
echo "<script type='text/javascript'>document.location.replace('private_gallery.php');</script>";

?>