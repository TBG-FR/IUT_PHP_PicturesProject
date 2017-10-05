<?php 
            try {
                $bdd=new PDO ('mysql:host=localhost;dbname=bdd','root','');
            }
            catch (Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }

            $req=$bdd->query('SELECT id,commentaire,DATE_FORMAT(date_commentaire,\'%d/%m/%Y\') AS date_commentaire_fr FROM commentaires ORDER BY date_commentaire DESC');?>

        




<?php
$bdd->exec('UPDATE commentaires SET afficher=0');
    foreach($_POST["coche"] as $value)
        {
        
            $id=$value;
            
            $req = $bdd->prepare('UPDATE commentaires SET afficher=1 WHERE id= :id');
        $req->execute(array(
            'id' => $value
        ));   
        } 
?>
<?php header('Location: admin_avis.php'); ?>