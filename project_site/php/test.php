<?php

    require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start


                
                $db = new Database();

//                $req01 = $db->query("INSERT INTO phpproj_User (username, password, admin) VALUES ('AAA', 'BBB', '0')",array(),TRUE);
//                $req02 = $db->query("INSERT INTO phpproj_user (username, password, admin) VALUES ('AAA', 'BBB', '0')",array(),TRUE);
//
//                //$req03 = $db->query("INSERT INTO phpproj_user (username, password, admin, email) VALUES ('$login', '$hash', '0', '$mail')", array(), TRUE);
//                $req04 = $db->query("INSERT INTO phpproj_user (username, password, admin, email) VALUES ('AAA', 'BBB', '0', 'CCC@CCC')", array(), TRUE);
//
//
//                $req05 = $db->save("phpproj_user", array(
//                    'username' => 'ABJ',
//                    'admin' => 0,
//                    'password' => 'monSuperMotDePasse', // le mot de passe sera crypté automatiquement selon la règle choisi dans la méthode hash()
//                    'email' => 'mail@gogolplex.ro'
//                ));
//
                $user='Jean'; $pass='maison'; $mail='allo@al.fr';

                $req06 = $db->save("phpproj_user", array(
                    'username' => $user,
                    'admin' => 0,
                    'password' => $pass, // le mot de passe sera crypté automatiquement selon la règle choisi dans la méthode hash()
                    'email' => $mail
                ));
//
//
//                var_dump($req01);
//                var_dump($req02);
////                var_dump($req03);
//                var_dump($req04);
//                var_dump($req05);
                var_dump($req06);
//
//                if($req05) { echo "5 - OUI OUI OUI"; } else {echo "5 - NON NON NON";}
//                if($req06) { echo "6 - OUI OUI OUI"; } else {echo "6 - NON NON NON";}

//
//                $list = $db->query("SELECT * FROM phpproj_user");
//                var_dump($list);


// Normally, this part would be unnecessary, we would just check if $up return TRUE, but the method save() strangely return an empty array...            
            $user_check = $db->read($bdd_table_user, array(
                'conditions' => array(
                    'username LIKE' => "Jean" // Check if there is an entry with the same username
                ),
                'fields' => array('id', 'username'), // get result (id, username)
            ));

            var_dump($user_check);    
            var_dump($user_check['3']['id']);

echo $user_check['0']['username']."'s Gallery";

 //Insert the new Gallery for this user       
            $gal_insert = $db->save("phpproj_gallery", array(
                    'id' => 37,
                    'title' => 'Gallery'
                ));

$req05 = $db->save('phpproj_gallery', array(
                    'id' => '7',
                    'title' => 'ADDvv'
                ));

var_dump($req05);

$u1 = $user_check['3']['id'];
$u2 = $user_check['3']['username']." Gallery";
var_dump($u1);
var_dump($u2);

$req02 = $db->query("INSERT INTO phpproj_gallery (id, title) VALUES ($u1, $u2)",array(),TRUE);
$req02 = $db->query("INSERT INTO phpproj_gallery (id, title) VALUES ('26', 'BBB')",array(),TRUE);

var_dump($req02);



                $list2 = $db->query("SELECT * FROM phpproj_gallery");
                var_dump($list2);



//
//$r12 = $db->save("phpproj_user", array(
//    'username' => 'Branlouis',
//    'admin' => 0,
//    'password' => 'Clyde' // le mot de passe sera crypté automatiquement selon la règle choisi dans la méthode hash()
//));
//
//+ Options
// Textes complets	
//id
//username
//password
//admin
//firstname
//lastname
//address
//zip
//city
//email
//
//
//
//    echo "--------------------------------// -------------------------- //";
//
//$var1 = "ALEzzzEEELO";
//    $var2 = "ALzzEEEEEEEUIL";
//$var12 = "phpproj_user";
//
//            $r1 = $db->query("INSERT INTO $var12 (username, password, admin) VALUES ('$var1', '$var2', '0')",array(),TRUE);
//
//
//$r1 = $db->save("phpproj_user", array(
//    'username' => 'ABJ',
//    'admin' => 0,
//    'password' => 'monSuperMotDePasse' // le mot de passe sera crypté automatiquement selon la règle choisi dans la méthode hash()
//));
//
//
//
//            
//            $red = $db->save("users", array(
//            'nom' => 'AAMartin',
//            'prenom' => 'Thomas',
//            'age' => 34,
//            'password' => 'monSuperMotDePasse' // le mot de passe sera crypté automatiquement selon la règle choisi dans la méthode hash()
//            ));
//
//            $login = 'bite';
//            $pass = 'loge';
//            
//            $up = $db->save("phpproj_user", array(
//            'username' => $login,
//            'password' => $pass, // Password will be automatically crypted using hash() method from Database class
//            //'firstname' => $f_name,
//            //'lastname' => $l_name,
//            'admin' => 0
//            ));
//
//            $res = $db->save("phpproj_user", array(
//                'username' => 'BBMartin',
//                'password' => 'monSuperMotDePasse' // le mot de passe sera crypté automatiquement selon la règle choisi dans la méthode hash()
//            ));
//            
//            $rev = $db->save("phpproj_user", array(
//                'id' => 145,
//                'nom' => 'CCMartin',
//                'prenom' => 'Thomas',
//                'age' => 35,
//                'password' => 'monAutreSuperMotDePasse' // le mot de passe sera crypté automatiquement selon la règle choisi dans la méthode hash()
//            ));
////            
//            $r2 = $db->query("SELECT * FROM phpproj_user");
//
////            /* TEMP */ var_dump($red);
////            /* TEMP */ var_dump($up);
////            /* TEMP */ var_dump($res);
////            /* TEMP */ var_dump($rev);
//            /* TEMP */ var_dump($r1);
//            /* TEMP */ var_dump($r2);

?>