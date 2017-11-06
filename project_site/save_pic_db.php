<?php

require_once("classes/all.inc.php");

$visible=true;

//construct($p_id, $p_title, $p_desc, $p_date, $p_public, $p_path, $p_state = 0)
$pic= new Picture(-1, $_POST["pic_title"], $_POST["pic_desc"], $_POST["pic_date"], $visible, $_POST["pic_name"]);
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
//$path=$pic->getPath();//.$pic->getTitle();
//$path_watermarked=$pic->getPath(); //.$pic->getTitle();
/*$req = $db->query("INSERT INTO phpproj_picture (id,title,description,date,public,path_original,path_watermarked) VALUES ({$pic->getId()},{$pic->getTitle()},{$pic->getDescription()},{$pic->getDate()},{$pic->getPublic()},{$path},{$path_watermarked})");*/
$res=$db->save("phpproj_picture", array(
        'title'=>$pic->getTitle(),
        'description'=>$pic->getDesc(),
        'date'=>$pic->getDate(),
        'public'=>$pic->getPublic(),
        'path_original'=>$pic->getPath(),
        'path_watermarked'=>$pic->getPath()
    ));
$pic->setId($db->getMaxPicId());
echo $pic->getId();
var_dump($pic);

//$db->isKeywordInDB('');
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

?>