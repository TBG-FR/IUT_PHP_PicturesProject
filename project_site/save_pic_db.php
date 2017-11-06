<?php

require_once("classes/all.inc.php");
    require_once("head.php");

/** 
* WATERMARKING FUNCTION 
* by Tom-Brian Garcia
* (Inspired by http://www.lephpfacile.com/cours/22-la-librairie-gd)
* 
* Creates the Watermarked copy of the given image
* @param bool $white : defines the color of the watermark (white or black)
* @param string $src_path : the path of the given image
**/
function apply_watermark($white, $src_path) {

    // IF the given image is a JPG/JPEG => Use the functions related to JPEG
    //if( exif_imagetype($src_path) == IMAGETYPE_JPEG ) {
    if( strpos($src_path, ".jpeg") || strpos($src_path, ".jpg") || strpos($src_path, ".JPG") || strpos($src_path, ".JPEG") ) {

        // Indicates which file type we will create (here, a jpeg image)
        //header ("Content-type: image/jpeg");

        // Creation of the image ressource for the source image
        $img_src = ImageCreateFromJpeg("private_images/".$src_path);

        // Destination image width and height
        $width_dest = imagesx($img_src);
        $height_dest = imagesy($img_src);

        // Watermark image  width and height (here, we choosed to use destination image dimensions divided by 4)
        $width_wtmk = $width_dest / 4;
        $height_wtmk = $height_dest / 4;
        
        // Creation of the image ressources for the watermark image, with the defined dimensions
        $img_wtmk = ImageCreate($width_wtmk, $height_wtmk) or die ("Error while creating Watermark...");

        // Creation of a color for the background of the watermark
        $wtmk_bg = imagecolorallocate($img_wtmk, 255, 255, 255);

        // Creation of a color for the text of the watermark, depending on user's choice

        if( $white == TRUE ) { $wtmk_txt = imagecolorallocate($img_wtmk, 255, 255, 255); }
        else { $wtmk_txt = imagecolorallocate($img_wtmk, 0, 0, 0); }

        // Image filling (with bg color) and then transforming every part of that color into a transparent one
        imagefilledrectangle($img_wtmk, 0, 0, 150, 150, $wtmk_bg);
        imagecolortransparent($img_wtmk, $wtmk_bg);

        // Adding the Watermark text to the Watermark image | imagettftext(image, size, angle, x, y, color, fontfile, text);
        imagettftext($img_wtmk, $height_wtmk/4, -25, $width_wtmk/8, $height_wtmk/3, $wtmk_txt, "fonts/Champagne & Limousines.ttf", "Andrew Blind");
        imagettftext($img_wtmk, $height_wtmk/4, 25, $width_wtmk/8, $height_wtmk/1.5, $wtmk_txt, "fonts/Champagne & Limousines.ttf", "Andrew Blind");

        // Applying the Watermak all around the image (to cover it entirely with Watermark)
        for ($i=4; $i>=0; $i--) {

            for ($j=4; $j>=0; $j--) {

                // Watermark positioning
                $x_dest_wtmk = $width_dest - ($width_wtmk * $i);        
                $y_dest_wtmk = $height_dest - ($height_wtmk * $j);

                // Watermark applying (last param = transparency)
                imagecopymerge_alpha($img_src, $img_wtmk, $x_dest_wtmk, $y_dest_wtmk, 0, 0, $width_wtmk, $height_wtmk, 35);


            }

        }

        // Rendering the image into the watermark folder
        ImageJpeg($img_src, "public_images/".$src_path);

    }

    // ELSE IF the given image is a PNG => Use the functions related to PNG
    //else if( exif_imagetype($src_path) == IMAGETYPE_PNG ) {
    if( strpos($src_path, ".png") || strpos($src_path, ".PNG") ) {
        
        echo "PNG!!!";

        // Indicates which file type we will create (here, a png image)
        //header ("Content-type: image/png");

        // Creation of the image ressource for the source image
        $img_src = ImageCreateFromPng("private_images/".$src_path);

        // Destination image width and height
        $width_dest = imagesx($img_src);
        $height_dest = imagesy($img_src);

        // Watermark image  width and height (here, we choosed to use destination image dimensions divided by 4)
        $width_wtmk = $width_dest / 4;
        $height_wtmk = $height_dest / 4;

        // Creation of the image ressources for the watermark image, with the defined dimensions
        $img_wtmk = ImageCreate($width_wtmk, $height_wtmk) or die ("Error while creating Watermark...");

        // Creation of a color for the background of the watermark
        $wtmk_bg = imagecolorallocate($img_wtmk, 255, 255, 255);

        // Creation of a color for the text of the watermark, depending on user's choice

        if( $white == TRUE ) { $wtmk_txt = imagecolorallocate($img_wtmk, 255, 255, 255); }
        else { $wtmk_txt = imagecolorallocate($img_wtmk, 0, 0, 0); }

        // Image filling (with bg color) and then transforming every part of that color into a transparent one
        imagefilledrectangle($img_wtmk, 0, 0, 150, 150, $wtmk_bg);
        imagecolortransparent($img_wtmk, $wtmk_bg);

        // Adding the Watermark text to the Watermark image | imagettftext(image, size, angle, x, y, color, fontfile, text);
        imagettftext($img_wtmk, $height_wtmk/4, -25, $width_wtmk/8, $height_wtmk/3, $wtmk_txt, "fonts/Champagne & Limousines.ttf", "Andrew Blind");
        imagettftext($img_wtmk, $height_wtmk/4, 25, $width_wtmk/8, $height_wtmk/1.5, $wtmk_txt, "fonts/Champagne & Limousines.ttf", "Andrew Blind");

        // Applying the Watermak all around the image (to cover it entirely with Watermark)
        for ($i=4; $i>=0; $i--) {

            for ($j=4; $j>=0; $j--) {

                // Watermark positioning
                $x_dest_wtmk = $width_dest - ($width_wtmk * $i);        
                $y_dest_wtmk = $height_dest - ($height_wtmk * $j);

                // Watermark applying (last param = transparency)
                imagecopymerge_alpha($img_src, $img_wtmk, $x_dest_wtmk, $y_dest_wtmk, 0, 0, $width_wtmk, $height_wtmk, 35);


            }

        }

        // Rendering the image into the watermark folder
        ImagePng($img_src, "public_images/".$src_path);

    }

    // ELSE (Errors or wrong type) => Throw an Exception
    else {

        //echo "<br /><div class=\"notification alert alert-danger\" role=\"alert\">Error : Unsupported image format ! Please try again with PNG, JPG or JPEG.</div>";
        throw new Exception('Err_UnsupportedFormat');

    }
    
}

/* ----------------------------------------------------------------------------------------------------- */

$visible=true;

var_dump($_POST); //REMOVE

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

/*$req = $db->query("INSERT INTO phpproj_picture (id,title,description,date,public,path_original,path_watermarked) VALUES ({$pic->getId()},{$pic->getTitle()},{$pic->getDescription()},{$pic->getDate()},{$pic->getPublic()},{$path},{$path_watermarked})");*/
$res=$db->save("phpproj_picture", array(
        'title'=>$pic->getTitle(),
        'description'=>$pic->getDesc(),
        'date'=>$pic->getDate(),
        'public'=>$pic->getPublic(),
        'path'=>$pic->getPath()
    ));
$pic->setId($db->getMaxPicId());
echo $pic->getId();

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

// ADD : Verif Picture in Database + Picture in Folder

if( $_POST["wtmk_color"] == "black" ) { apply_watermark(0, $pic->getPath()); }
else { apply_watermark(1, $pic->getPath()); }

// Here is what the code should look like (we should use a try-catch, display eventual errors, etc) but we get a false positive when rendering a JPEG (due to alpha channel, I think)
/*
try {
    if( $_POST["wtmk_color"] == "black" ) { apply_watermark(0, $path); }
    else { apply_watermark(1, $path); }
    
    echo "<div class='notification alert alert-success' role='alert'>Watermarked picture successfully created !</div>";
    
}
catch (Exception $e) {
    
    if($e->getMessage() == 'Err_UnsupportedFormat') {
        echo "<div class='notification alert alert-danger' role='alert'>Error : Unsupported image format ! Please try again with PNG, JPG or JPEG.</div>";
    }
    
    else {
        echo "<div class='notification alert alert-danger' role='alert'>Error while creating watermark ! Please try again with PNG, JPG or JPEG.</div>";
    }
}

echo "<br /><a href='private_gallery.php' class='btn btn-default' role='button'>Continue</a>";
echo "<br /><a href='add_picture.php' class='btn btn-primary' role='button'>Add another image</a>";

*/

// Send the user back to the Picture Management & Unset his Galleries (in order to refresh it)
unset($_SESSION['private_gal']);
unset($_SESSION['public_gal']);
echo "<script type='text/javascript'>document.location.replace('private_gallery.php');</script>";

?>