<?php 
            try {
                $bdd=new PDO ('mysql:host=localhost;dbname=bdd','root','');
            }
            catch (Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }

            $req=$bdd->query('SELECT id FROM news');
?>

<?php 
echo $_POST['ID'];
 $req = $bdd->prepare('DELETE FROM news WHERE id= :id');
        $req->execute(array(
            'id' => $_POST['ID']
        )); 


/*
 while($donnees = $req->fetch())
            {
            ?>
            <?php
     $id=$donnees['id'];
     echo $id;
     echo $_GET['$id'] ;
     if( isset( $_GET[$id] ) ) {
         
         $req = $bdd->prepare('DELETE FROM news WHERE id= :id');
        $req->execute(array(
            'id' => $donnees['id']
        )); 
         echo $donnees['id'];
         
     }
     else {
         //echo $donnees['id'];
     }*/
    ?>
            <?php
                /*}*/ 
            $req->closeCursor();
            ?>

<?php header('Location: admin_news.php'); ?>