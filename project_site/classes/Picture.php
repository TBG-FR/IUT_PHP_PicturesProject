<?php

	//require_once('conf.bdd.php');

/**
 * Class Picture
 * {DESCRIPTION}
 */
class Picture
{

    /* ----- ----- ----- Attributes ----- ----- ----- */
    
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
    
    /**
     * @var string Filename/path
     */
    private $path;
    
    /**
     * @var int Define the status of the picture (0=normal, 1=in cart, 2=bought), useful for displaying gallery to the user
     */
    private $state;

    /* ----- ----- ----- Constructors ----- ----- ----- */

    /**
     * _____
     */
    public function __construct($p_id, $p_title, $p_desc, $p_date, $p_public, $p_path, $p_state = 0) {
        
        $this->id = $p_id;
        $this->name = $p_title;
        $this->desc = $p_desc;
        $this->date = $p_date;
        $this->visible = $p_public;
        $this->path = $p_path;
        $this->state = $p_state;
        
        return $this;
        
    }
    
    /* ----- ----- ----- Functions ----- ----- ----- */    

    /**
     * { DESCRIPTION }
     * @param _ _
     * @return _ _
     */
    public function getID() {

        return $this->id;
        
    }
    
    /**
     * { DESCRIPTION }
     * @param _ _
     * @return _ _
     */
    public function getName() {

        return $this->name;
        
    }
    
    /**
     * { DESCRIPTION }
     * @param _ _
     * @return _ _
     */
    public function getTitle() {

        return $this->name;
        
    }
    
    /**
     * { DESCRIPTION }
     * @param _ _
     * @return _ _
     */
    public function getDesc() {

        return $this->desc;
        
    }
    
    /**
     * { DESCRIPTION }
     * @param _ _
     * @return _ _
     */
    public function getDate() {

        return $this->date;
        
    }
    
    /**
     * { DESCRIPTION }
     * @param _ _
     * @return _ _
     */
    public function getPublic() {

        return $this->visible;
        
    }

    /**
     * { DESCRIPTION }
     * @param _ _
     * @return _ _
     */
    public function getPath() {

        return $this->path;
        
    }
    
    /**
     * { DESCRIPTION }
     * @param _ _
     * @return _ _
     */
    public function getState() {

        return $this->state;
        
    }

    /**
     * { DESCRIPTION }
     * @param _ _
     * @return _ _
     */
    public function setState($new_state) {

        $this->state = $new_state;
        
    }
    
    //================================================================================================================
    
    
    public function getKeywords (){
        return $this->keywords;
    }
    
    public function setKeywordsFromDB (){
        $db=new Database();
        $all_public_img = $db->read("phpproj_picturekeyword", array(
                'conditions' => array(
                    'pic_id =' => $this->id
                ),
                'fields' => array('KEY_id'),
            ));
        //var_dump($all_public_img);
        foreach ($all_public_img as $value){
             $res=$db->read("phpproj_keyword", array(
                'conditions' => array(
                    'id =' => $value['KEY_id']
                ),
                'fields' => array('name'),
            ));
            $this->addKeyword($res[0]['name']);
        }
        
        
        
        
    }
    
    
    
    public function getKeywordsStr(){
        $keyStr="";
        //var_dump($this->keywords);
        if($this->keywords != NULL){
            foreach ($this->keywords as $value) {
            $keyStr=$keyStr.$value.",";
            }
            $keyStr=substr($keyStr,0,-1);
        }
        return $keyStr;
    }

    public function getKeywordsSortable(){
        $keyStr="";
        //var_dump($this->keywords);
        if($this->keywords != NULL){
            foreach ($this->keywords as $value) {
            $keyStr=$keyStr.$value." ";
            }
        }
        return $keyStr;
    }
    
    
     public function setId ($id){
        $this->id=$id;
    }
    
    public function addKeyword($new_keyword){
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
    
    
    public function addImage($pic_name, $pic_error, $tmp_pic_name){
        if ($pic_error > 0) { $erreur = "Erreur lors du transfert"; }
        $extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
        $extension_upload = strtolower(substr(strrchr($pic_name, '.'),1));
        
        if ( in_array($extension_upload,$extensions_valides) )
            {
                $resultat = move_uploaded_file($tmp_pic_name,"private_images/{$pic_name}");
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