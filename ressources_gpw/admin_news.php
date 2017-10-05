<!DOCTYPE html>
<html>  
<head>
        <meta charset="utf-8">

        <title>Accueil - Ducrozet-Moninot</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="style_global.css">
        <link rel="stylesheet" href="style.css">
        <!-- Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Scripts Javascript -->
        <SCRIPT language="javascript">
            window.location.reload;
        </SCRIPT>

    </head>
    
<body>
    <a class="btn btn-default" href="index.php" role="link-button">Retour à l'accueil</a>
    <?php include("admin.php"); ?>
    <div id="admin">
<?php 
            try {
                $bdd=new PDO ('mysql:host=localhost;dbname=bdd','root','');
            }
            catch (Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }

            $req=$bdd->query('SELECT id,texte ,DATE_FORMAT(date,\'%d/%m/%Y\') AS date FROM news ORDER BY date DESC');?>
            
            
    
            <?php while($donnees = $req->fetch()) 
            { ?>
        <?php 
                $id=$donnees['id'];?>
                <section id="commentaireside">
                    <?php echo $donnees['texte'];?> <br \>
                </section>
                <date>
                Le <?php echo $donnees['date'];?> 
                <br \>
                </date> 
                <form action="suppr_news.php" method="post">
                <input type="hidden" name="ID" value="<?php echo($id); ?>" />
                <input type="submit" name = " <?php echo($id);?> " value="Supprimer" class="btn btn_danger"> 

            </form>
            <?php } ?>
                  <!-- Trigger the modal with a button -->
            <div id="boutonform">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"> Ajouter news </button> </div>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Ajouter news </h4>
                  </div>
                  <div class="modal-body">
                      
                      
                    <form action="envoyer_news.php" method="post" class="col-lg-6">

                    <div class="form-group">
                        <label for="textarea"> Ajouter news :</label>
                        <textarea id="textarea" type="textarea" class="form-control" name="textarea"></textarea>

                    </div>

                    <input type="submit" class="btn btn-default" value="Envoyer"/>

                      </form>  
                  </div>
                  <div class="modal-footer">
        
                    </div>
                </div>

              </div>
            </div>  
              
           
            <br \>
            <?php $req->closeCursor();?>
            </div>
    
        <footer>
            <?php include("footer.php"); ?>
        </footer>
        </body>
    </html> 