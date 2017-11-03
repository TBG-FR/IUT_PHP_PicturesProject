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
        $bdd_table_pic_key = 'phpproj_picturekeyword';
        $bdd_table_keyword = 'phpproj_keyword';
        $bdd_table_gallery = 'phpproj_gallery';
        $bdd_table_gal_pic = 'phpproj_gallerypicture';

        /* TEMP TEMP ----- ----- TEMP TEMP */

        $db = new Database();
        $this->nb_pictures = 0;

        // IF THE USER IS LOGGED
        if($logged) {

            // IF THIS IS A PUBLIC GALLERY => CONSTRUCT "CUSTOMISED" PUBLIC GALLERY
            if($public) {

                $this->id = 1; /* A Gallery of id 1 is a Customised Public Gallery */

                // ----------------------- STEP 1 : GET ALL PUBLIC PICTURES
                $all_public_img = $db->read($bdd_table_picture, array(
                    'conditions' => array(
                        'public LIKE' => '1'
                    ),
                    'fields' => array('*'),
                ));

                foreach($all_public_img as $pic) {

                    //  FCT : addPicture($id, $title, $desc, $public, $path, $state)
                    $this->addPicture($pic['id'], $pic['title'], $pic['description'], $pic['date'], $pic['public'], $pic['path_watermarked'], 0);

                }

                // ----------------------- STEP 2 : GET USER "PRIVATE" (BOUGHT) PICTURES 

                $user_img_list = $db->read($bdd_table_gal_pic, array(
                    'conditions' => array(
                        'gal_id LIKE' => $user_id
                    ),
                    'fields' => array('pic_id'),
                ));

                // ----------------------- STEP 3 : EDIT PICTURES STATE (FROM 0 TO 2) ONE BY ONE 
                foreach($user_img_list as $user_img) {

                    $this->pictures[$user_img['pic_id']]->setState(2);

                }                

            }

            // ELSE (NOT A PUBLIC GALLERY) => CONSTRUCT USER PRIVATE GALLERY
            else {

                $this->id = $user_id;

                // IF THE USER IS THE ADMIN => CONSTRUCT THE "ADMIN" GALLERY
                if( $user_id == 2 ) {

                    // ----------------------- STEP 1 : GET ALL PICTURES (PUBLIC & NOT)
                    $all_img = $db->read($bdd_table_picture, array(
                        'conditions' => array(),
                        'fields' => array('*'),
                    ));

                    foreach($all_img as $pic) {

                        //  FCT : addPicture($id, $title, $desc, $public, $path, $state)
                        $this->addPicture($pic['id'], $pic['title'], $pic['description'], $pic['date'], $pic['public'], $pic['path_original'], 0);

                    }

                }

                //ELSE (NORMAL USER) => CONSTRUCT USER PRIVATE GALLERY
                else {

                    // ----------------------- STEP 1 : GET USER "PRIVATE" (BOUGHT) PICTURES
                    $user_img_list = $db->read($bdd_table_gal_pic, array(
                        'conditions' => array(
                            'gal_id LIKE' => $user_id
                        ),
                        'fields' => array('pic_id'),
                    ));

                    // ----------------------- STEP 2 : ADD THEM ONE BY ONE IN THE GALLERY
                    foreach($user_img_list as $user_img) {

                        $pic = $db->read($bdd_table_picture, array(
                            'conditions' => array(
                                'id LIKE' => $user_img['pic_id']
                            ),
                            'fields' => array('*'),
                        ));

                        //  FCT : addPicture($id, $title, $desc, $public, $path, $state)
                        $this->addPicture($pic[0]['id'], $pic[0]['title'], $pic[0]['description'], $pic[0]['date'], $pic[0]['public'], $pic[0]['path_original'], 2);

                    }

                }

            }


        }

        // ELSE (USER NOT LOGGED) => CONSTRUCT "BASIC" PUBLIC GALLERY
        else {

            $this->id = 0; /* A Gallery of id 0 is the "Basic" Public Gallery */

            $all_public_img = $db->read($bdd_table_picture, array(
                'conditions' => array(
                    'public LIKE' => '1'
                ),
                'fields' => array('*'),
            ));

            foreach($all_public_img as $pic) {

                //  FCT : addPicture($id, $title, $desc, $public, $path, $state)
                $this->addPicture($pic['id'], $pic['title'], $pic['description'], $pic['date'], $pic['public'], $pic['path_watermarked'], 0);

            }

        }

        return $this;

    }


    /* ----- ----- ----- Functions ----- ----- ----- */

    /**
     * { DESCRIPTION }
     * @param _ _
     * @return _ _
     */
    public function getTitle() {
        
        return $this->title;
        
    }

    /**
     * { DESCRIPTION }
     * @param _ _
     * @return _ _
     */
    public function getPictures() {
        
        return $this->pictures;
        
    }

    /**
     * { DESCRIPTION }
     * @param _ _
     * @return _ _
     */
    public function setXXX() {

        //        return $this->status;
    }

    /**
     * { DESCRIPTION }
     * @param _ _
     * @return _ _
     */
    private function addPicture($id, $title, $desc, $date, $public, $path, $state) {

        $this->pictures[$this->nb_pictures+1] = new Picture($id, $title, $desc, $date, $public, $path, $state);
        $this->nb_pictures = $this->nb_pictures + 1;

    }

}



// on évitera de fermer la balise php pour ne pas injecter de caratères invible sur les pages parentes