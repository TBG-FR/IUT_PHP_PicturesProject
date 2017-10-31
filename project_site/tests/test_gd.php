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
$src_file = "source.png";
$src_wtmk = "watermark.png";

// Creation of two images ressources : one for the source image, one for the watermark
$img_src = ImageCreateFromPng($src_file);
$img_wtmk = ImageCreateFromPng($src_wtmk);

// Destination image width and height
$width_dest = imagesx($img_src);
$height_dest = imagesy($img_src);

// Watermark image  width and height
$width_wtmk = imagesx($img_wtmk);
$height_wtmk = imagesy($img_wtmk);

for ($i=4; $i>=0; $i--) {
    
    for ($j=4; $j>=0; $j--) {
        
        // Watermark positioning
        $x_dest_wtmk = $width_dest - ($width_wtmk * $i);        
        $y_dest_wtmk = $height_dest - ($height_wtmk * $j);
        
        // Watermark applying (last param = transparency)
        imagecopymerge_alpha($img_src, $img_wtmk, $x_dest_wtmk, $y_dest_wtmk, 0, 0, $width_wtmk, $height_wtmk, 55);
        
        
    }
    
}

// Image displaying
Imagepng ($img_src);

?>