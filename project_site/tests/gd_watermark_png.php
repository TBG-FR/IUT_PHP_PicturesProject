<?php

/** 
* PNG ALPHA CHANNEL SUPPORT for imagecopymerge(); 
* by Sina Salek 
* 
* Bugfix by Ralph Voigt (bug which causes it 
* to work only for $src_x = $src_y = 0. 
* Also, inverting opacity is not necessary.) 
* 08-JAN-2011 
* 
**/ 
    function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct){ 
        // creating a cut resource 
        $cut = imagecreatetruecolor($src_w, $src_h); 

        // copying relevant section from background to the cut resource 
        imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h); 
        
        // copying relevant section from watermark to the cut resource 
        imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h); 
        
        // insert cut resource to destination image 
        imagecopymerge($dst_im, $cut, $dst_x, $dst_y, 0, 0, $src_w, $src_h, $pct); 
    } 
/* ------------------------------------------------------------------------------------------------ */

// on spécifie le type de fichier créer (ici une image de type jpeg)
header ("Content-type: image/png");

// on crée deux variables contenant les chemins d'accès à nos deux fichiers : $fichier_source contenant le lien vers l'image à "copyrighter", $fichier_copyright contenant le lien vers la petite vignette contenant le copyright (bien sur, on prendra soin de placer les images sources dans un répertoire "caché" sinon le copyright ne sert à rien si les visiteurs ont accès aux images sources)
$src_file = "source0.png";
//$src_wtmk = "watermark.png";

// Creation of two images ressources : one for the source image, one for the watermark
$img_src = ImageCreateFromPng($src_file);

// Destination image width and height
$width_dest = imagesx($img_src);
$height_dest = imagesy($img_src);

// Watermark image  width and height
$width_wtmk = $width_dest / 4;
$height_wtmk = $height_dest / 4;

/* ------------------------------------------------------------------------------------------------ */

// on crée une ressource pour notre image qui aura comme largeur $largeur et $hauteur comme hauteur (on place également un or die si la création se passait mal afin d'avoir un petit message d'alerte)
$img_wtmk = ImageCreate($width_wtmk, $height_wtmk) or die ("Error while creating Watermark...");

// Create the color 'black'
//$black = imagecolorallocate($img_wtmk, 0, 0, 0);

// Transform all the black into transparent "color" on that image
//imagecolortransparent($img_wtmk, $black);

$white = imagecolorallocate($img_wtmk, 255, 255, 255);
//$black = imagecolorallocate($img_wtmk, 255, 255, 255);
$black = imagecolorallocate($img_wtmk, 0, 0, 0);
imagefilledrectangle($img_wtmk, 0, 0, 150, 150, $white);
imagecolortransparent($img_wtmk, $white);

// Add the Watermark text to the Watermark image
imagettftext($img_wtmk, $height_wtmk/4, -25, $width_wtmk/8, $height_wtmk/3, $black, "../fonts/Champagne & Limousines.ttf", "Andrew Blind");
imagettftext($img_wtmk, $height_wtmk/4, 25, $width_wtmk/8, $height_wtmk/1.5, $black, "../fonts/Champagne & Limousines.ttf", "Andrew Blind");
//imagettftext(image, size, angle, x, y, color, fontfile, text);
        
/* ------------------------------------------------------------------------------------------------ */

for ($i=4; $i>=0; $i--) {
    
    for ($j=4; $j>=0; $j--) {
        
        // Watermark positioning
        $x_dest_wtmk = $width_dest - ($width_wtmk * $i);        
        $y_dest_wtmk = $height_dest - ($height_wtmk * $j);
        
        // Watermark applying (last param = transparency)
        imagecopymerge_alpha($img_src, $img_wtmk, $x_dest_wtmk, $y_dest_wtmk, 0, 0, $width_wtmk, $height_wtmk, 35);
        
        
    }
    
}

// Image displaying
ImagePng($img_src, "render.png");

?>