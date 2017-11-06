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

function apply_watermark($white, $src_path) {

    // IF the given image is a JPG/JPEG => Use the functions related to JPEG
    if( exif_imagetype($src_path) == IMAGETYPE_JPEG ) {

        // Indicates which file type we will create (here, a jpeg image)
        header ("Content-type: image/jpeg");

        // Creation of the image ressource for the source image
        $img_src = ImageCreateFromJpeg($src_path);

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
        imagettftext($img_wtmk, $height_wtmk/4, -25, $width_wtmk/8, $height_wtmk/3, $wtmk_txt, "../fonts/Champagne & Limousines.ttf", "Andrew Blind");
        imagettftext($img_wtmk, $height_wtmk/4, 25, $width_wtmk/8, $height_wtmk/1.5, $wtmk_txt, "../fonts/Champagne & Limousines.ttf", "Andrew Blind");

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
        ImageJpeg ($img_src, "render/$src_path");

    }

    // ELSE IF the given image is a PNG => Use the functions related to PNG
    else if( exif_imagetype($src_path) == IMAGETYPE_PNG ) {

        // Indicates which file type we will create (here, a png image)
        header ("Content-type: image/png");

        // Creation of the image ressource for the source image
        $img_src = ImageCreateFromPng($src_path);

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
        imagettftext($img_wtmk, $height_wtmk/4, -25, $width_wtmk/8, $height_wtmk/3, $wtmk_txt, "../fonts/Champagne & Limousines.ttf", "Andrew Blind");
        imagettftext($img_wtmk, $height_wtmk/4, 25, $width_wtmk/8, $height_wtmk/1.5, $wtmk_txt, "../fonts/Champagne & Limousines.ttf", "Andrew Blind");

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
        ImagePng ($img_src, "render/$src_path");

    }

    else {

        //echo "<br /><div class=\"notification alert alert-danger\" role=\"alert\">Error : Unsupported image format ! Please try again with PNG, JPG or JPEG.</div>";
        throw new Exception('Err_UnsupportedFormat');

    }
    
}

try {
    apply_watermark(1, "source1.png");
    apply_watermark(0, "source0.png");
    apply_watermark(TRUE, "sourcet.png");
    apply_watermark(FALSE, "sourcef.png");    
}
catch (Exception $e) { echo $e->getMessage(); }

echo "END PNG";

try {
    apply_watermark(1, "source1.jpg");
    apply_watermark(0, "source0.jpg");
    apply_watermark(TRUE, "sourcet.jpg");
    apply_watermark(FALSE, "sourcef.jpg");    
}
catch (Exception $e) { echo $e->getMessage(); }

echo "END JPG";


?>