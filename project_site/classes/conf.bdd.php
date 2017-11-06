<?php       // File "conf.bdd.php" : ___decription__

// For security reasons, we could rename this file with a "weird" (unexpected) name, making it harder to find for potential "hackers"

/* ===== ===== BDD Tables Names ===== ===== */
// Useful if the names have been modified (by us or the SGBD)
// Change the names of the tables here, and it will apply for the entire website
global $bdd_table_user;
global $bdd_table_picture;
global $bdd_table_pic_key;
global $bdd_table_keyword;
global $bdd_table_gallery;
global $bdd_table_gal_pic;

$bdd_table_user = 'phpproj_User';
$bdd_table_picture = 'phpproj_Picture';
$bdd_table_pic_key = 'phpproj_PictureKeyword';
$bdd_table_keyword = 'phpproj_Keyword';
$bdd_table_gallery = 'phpproj_Gallery';
$bdd_table_gal_pic = 'phpproj_GalleryPicture';

// add global ?
/* IUT
$host="localhost";
$user="p1520325";
$password="11520325";
$name="p1520325";*/
/* Wamp
$host="localhost";
$user="root";
$password="";
$name="bdd";*/

// TO_TRANSLATE
// on évitera de fermer la balise php pour ne pas injecter de caratères invible sur les pages parentes

// https://stackoverflow.com/questions/19934727/create-and-use-global-variable-without-the-global-keyword
// http://php.net/manual/fr/language.variables.scope.php