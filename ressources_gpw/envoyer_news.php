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
        $req = $bdd->prepare('INSERT INTO news(texte,date) VALUES(:texte, :date)');
        $req->execute(array(
            'texte' => $text,
            'date' => $date
        ));
?>

<SCRIPT language="javascript">
            //window.opener.location.reload();
            //window.self.close();
            window.history.back();
     window.location.reload;
</SCRIPT>