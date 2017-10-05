<?php
        try {
            $bdd=new PDO ('mysql:host=localhost;dbname=bdd','root','');
        }
        catch (Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    ?>                                  
        <?php   
        $text=$_POST['textarea'];
        $date=date("Y-m-d H:i:s");
        $id=7;
        $auteur='unknow';
        $req = $bdd->prepare('INSERT INTO commentaires(auteur,commentaire, date_commentaire, afficher) VALUES(:auteur, :commentaire, :date,0)');
        $req->execute(array(
            'auteur' => $auteur,
            'commentaire' => $text,
            'date' => $date
        ));
?>

<SCRIPT language="javascript">
            //window.opener.location.reload();
             //window.self.close();
            window.history.back();
</SCRIPT>