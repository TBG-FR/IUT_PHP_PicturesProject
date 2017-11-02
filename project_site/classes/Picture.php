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
    
    
    
    function Picture($pic_name="",$pic_desc="",$pic_date="",$pic_visible=false,$pic_id=-1) {
        $this->id=$pic_id;
        $this->name=$pic_name;
        $this->desc=$pic_desc;
        $this->date=$pic_date;
        $this->visible=$pic_visible;
        /*echo "1".$pic_name;
        echo "2".$pic_desc;
        echo "3".$pic_date;
        echo "4".$name;
        echo "5".$desc;
        echo "6".$date;*/
    }
    
    
    
    public function addKeword($new_keyword){
        $this->keywords[]=$new_keyword;
        
    }
    
    public function getNbKeyword(){
        return $nbkeywords;
    }
    
    public function displayPicInfo(){
        echo $this->name."</br>";
        echo $this->desc."</br>";
        echo $this->date."</br>";
        echo $this->visible."</br>";
        var_dump($this->keywords);
    }
    
    
    public function addImage($pic_name,$pic_error,$tmp_pic_name){
        if ($pic_error > 0) $erreur = "Erreur lors du transfert";
        $extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
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