<?php

    require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start + Disconnection Management    

$visible=true;

$pic= new Picture($_POST["pic_name"],$_POST["pic_desc"],$_POST["pic_date"],$visible);

$keyword='';
$chain=$_POST["pic_keywords"].",";

while ($chain!=''){
    $keyword = strstr($chain, ',', true);
    $pic->addKeword($keyword);
    //echo "{$keyword} done </br>";
    $chain=substr(strstr($chain, ','),1);
    //echo "{$chain} left </br> ";
}

$pic->displayPicInfo();

var_dump($pic);

?>