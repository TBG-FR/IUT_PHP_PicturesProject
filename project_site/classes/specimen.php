<?php

	//require_once('conf.bdd.php');

/**
 * Class CLASSE
 * { DESCRIPTION - DESCRIPTION - DESCRIPTION - DESCRIPTION - DESCRIPTION } 
 */
class CLASSE
{
    /**
     * @var null { DESCRIPTION - DESCRIPTION - DESCRIPTION - DESCRIPTION - DESCRIPTION }
     */
    private $VARIABLE = null;

    /**
     * @var string { DESCRIPTION - DESCRIPTION - DESCRIPTION - DESCRIPTION - DESCRIPTION }
     */
    private $VARIABLE;

    /**
     * @var string { DESCRIPTION - DESCRIPTION - DESCRIPTION - DESCRIPTION - DESCRIPTION }
     */
    private $VARIABLE;

    /**
     * @var string { DESCRIPTION - DESCRIPTION - DESCRIPTION - DESCRIPTION - DESCRIPTION }
     */
    private $VARIABLE;

    /**
     * @var string { DESCRIPTION - DESCRIPTION - DESCRIPTION - DESCRIPTION - DESCRIPTION }
     */
    private $VARIABLE;

    /**
     *  { DESCRIPTION - DESCRIPTION - DESCRIPTION - DESCRIPTION - DESCRIPTION }
     * @param TYPE $PARAMs
     * @return TYPE
     */
    private function FONCTION($PARAM){
        
        { CODE - CODE - CODE }
        
        return $VAR;
    }

    /**
     * @param TYPE $password
     * @return TYPE hashed
     */
    //private function hash($password){ //***MODIF_PROJECT***
    public function hash($password){
        // on choisira ici la méthode de cryptage de mot de passe
        //return md5($password);
        $options = array(
            'salt' => 'Zbk6s2i!!?vs+_tM2-&-=mvTpW4ReC945VH64Vb9&7$+R2UxW6Gb!@6eH#7P' // on choisi un code pour que l'algo de cryptage soit réversible
        );
        return password_hash($password, CRYPT_BLOWFISH, $options);
                                        /* PASSWORD_BCRYPT ? */

    }

    /**
     * une fonction intermédiaire qui formate les conditions d'un select
     * @param array $data
     * @return array
     */
    private function conditions($data){
        $condition = "";
        $values = array();
        if(count($data) > 0){
            foreach ($data as $key => $value){
                if($key == "password"){
                    $value = $this->hash($value); // si le mot de passe est recherché il faut chercher le mot de passe crypté
                }
                if($condition != ""){
                    $condition .= " AND ";
                }
                $operateur = explode(" ", $key); // gestion des opérateurs dans les conditions : <= >= != <> LIKE
                if(isset($operateur[1])){
                    $condition .= $operateur[0] . " " . $operateur[1] . " ? ";
                }else{
                    $condition .= $operateur[0] . " = ? ";
                }
                $values[] = $value;
            }
        }
        return array('condition' => $condition, 'values' => $values);
    }

// on évitera de fermer la balise php pour ne pas injecter de caratères invible sur les pages parentes