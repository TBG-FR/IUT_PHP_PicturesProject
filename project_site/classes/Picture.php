<?php

	//require_once('conf.bdd.php');

/**
 * Class Picture
 * {DESCRIPTION}
 */
class Picture
{
    /**
     * @var int store the id
     */
    private $id;

    /**
     * @var string the picture file name
     */
    private $name;

    /**
     * @var string the picture description
     */
    private $desc;

    /**
     * @var date the date the picture was taken
     */
    private $date;

    /**
     * @var bool set if the picture should be displayed
     */
    private $visible;
    
    /**
     * @var arraylist<keyword> to identify the picture
     */
    private $keywords;
   

    
    public function addImage($pic_name,$pic_error,$tmp_pic_name){
        if ($pic_error > 0) $erreur = "Erreur lors du transfert";
        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
        $extension_upload = strtolower(substr(strrchr($pic_name, '.'),1));
        
        if ( in_array($extension_upload,$extensions_valides) )
            {
                $resultat = move_uploaded_file($tmp_pic_name,"public_images/{$pic_name}");
            
                if ($resultat){
                    return 1;
                } else {
                    return 0;
                }
            
            } else {
                return 0;
            }
        }   
    }



// on évitera de fermer la balise php pour ne pas injecter de caratères invible sur les pages parentes