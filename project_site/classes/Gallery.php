<?php

//require_once('conf.bdd.php');

/**
 * Class Gallery
 * {DESCRIPTION}
 */
class Gallery
{

    /* ----- ----- ----- Attributes ----- ----- ----- */

    /**
     * @var int $id : ID of the gallery (should match the id of the user)
     */
    private $id;

    /**
     * @var string $title : Title of the gallery
     */
    private $title;

    /**
     * @var array<Picture> $pictures : Pictures of that Gallery
     */
    private $pictures;

    /**
     * @var int $nb_pictures : Number of Pictures in the Array
     */
    private $nb_pictures;

    /* ----- ----- ----- Constructors ----- ----- ----- */

    /**
     * { DESCRIPTION }
     * @param int $user_id
     * @param bool $logged
     * @param bool $public
     * @return _ _
     */
    public function __construct($user_id, $logged, $public){

        /* TEMP TEMP ----- ----- TEMP TEMP */

        $bdd_table_user = 'phpproj_user';
        $bdd_table_picture = 'phpproj_picture';
        $bdd_table_pic_key = 'phpproj_pictureKeyword';
        $bdd_table_keyword = 'phpproj_keyword';
        $bdd_table_gallery = 'phpproj_gallery';
        $bdd_table_gal_pic = 'phpproj_galleryPicture';

        /* TEMP TEMP ----- ----- TEMP TEMP */

        $db = new Database();
        $this->nb_pictures = 0;

        if($logged) {

            /*
            *
            *   GET THE BOUGHT IMAGES
            *
            */

            if($public) {

                /* CONSTRUCT "CUSTOMISED" PUBLIC GALLERY */
                $this->id = 1;

            }

            else {

                /* CONSTRUCT USER PRIVATE GALLERY */
                $this->id = $user_id;

            }



        }

        else {

            /* CONSTRUCT "BASIC" PUBLIC GALLERY */
            $this->id = 0;

            $all_public_img = $db->read($bdd_table_picture, array(
                'conditions' => array(
                    'public LIKE' => '1'
                ),
                'fields' => array('*'), // get that result (username)
            ));
            
            var_dump($all_public_img);
            
            foreach($all_public_img as $pic) {
                
                //  FCT : addPicture($id, $title, $desc, $public, $path, $state)
                $this->addPicture($pic['id'], $pic['title'], $pic['description'], $pic['public'], $pic['path_watermarked'], '0');
                
            }
            

            //            $res = $db->read($bdd_table_gallery, array(
            //                'conditions' => array(
            //                    'nom LIKE' => 'H%', // les noms commençant par H
            //                    'age >' => 20, // les personnes de plus de 20ans
            //                    'code_postal' => "01000" // qui habitent bourg en bresse
            //                ),
            //                'fields' => array('id', 'nom', 'prenom'), // la liste des champs souhaités
            //                'order' => array('age DESC'), // par age décroissant
            //                'limit' => 10, // limité à 10 éléments
            //                'offset' => 5 // à partir du 6eme élément
            //            ));

        }
        
        return $this;

    }


    /* ----- ----- ----- Functions ----- ----- ----- */

    /**
     * { DESCRIPTION }
     * @param _ _
     * @return _ _
     */
    public function disconnect(){

        $this->status = 0;

    }

    /**
     * { DESCRIPTION }
     * @param _ _
     * @return _ _
     */
    public function getStatus() {

        return $this->status;
    }

    /**
     * { DESCRIPTION }
     * @param _ _
     * @return _ _
     */
    private function addPicture($id, $title, $desc, $public, $path, $state) {

        $this->pictures[$this->nb_pictures+1] = new Picture($id, $title, $desc, $public, $path, $state);
        $this->nb_pictures = $this->nb_pictures + 1;

    }

}



// on évitera de fermer la balise php pour ne pas injecter de caratères invible sur les pages parentes