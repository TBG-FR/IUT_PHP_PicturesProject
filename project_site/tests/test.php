<?php

    require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start


                
                $db = new Database();

    echo "JUSTE BEFORE SAVE // JUSTE BEFORE SAVE // JUSTE BEFORE SAVE // JUSTE BEFORE SAVE";

$var1 = "ALEzzzEEELO";
    $var2 = "ALzzEEEEEEEUIL";
$var12 = "phpproj_user";
//            
            $r1 = $db->query("INSERT INTO $var12 (username, password, admin) VALUES ('$var1', '$var2', '0')",array(),TRUE);


$r1 = $db->save("phpproj_user", array(
    'username' => 'ABJ',
    'admin' => 0,
    'password' => 'monSuperMotDePasse' // le mot de passe sera crypté automatiquement selon la règle choisi dans la méthode hash()
));



            
            $red = $db->save("users", array(
            'nom' => 'AAMartin',
            'prenom' => 'Thomas',
            'age' => 34,
            'password' => 'monSuperMotDePasse' // le mot de passe sera crypté automatiquement selon la règle choisi dans la méthode hash()
            ));

            $login = bite;
            $pass = loge;
            
            $up = $db->save("phpproj_user", array(
            'username' => $login,
            'password' => $pass, // Password will be automatically crypted using hash() method from Database class
            //'firstname' => $f_name,
            //'lastname' => $l_name,
            'admin' => 0
            ));

            $res = $db->save("phpproj_user", array(
                'username' => 'BBMartin',
                'password' => 'monSuperMotDePasse' // le mot de passe sera crypté automatiquement selon la règle choisi dans la méthode hash()
            ));
            
            $rev = $db->save("users", array(
                'id' => 145,
                'nom' => 'CCMartin',
                'prenom' => 'Thomas',
                'age' => 35,
                'password' => 'monAutreSuperMotDePasse' // le mot de passe sera crypté automatiquement selon la règle choisi dans la méthode hash()
            ));
//            
            $r2 = $db->query("SELECT * FROM phpproj_user");

//            /* TEMP */ var_dump($red);
//            /* TEMP */ var_dump($up);
//            /* TEMP */ var_dump($res);
//            /* TEMP */ var_dump($rev);
            /* TEMP */ var_dump($r1);
            /* TEMP */ var_dump($r2);

?>