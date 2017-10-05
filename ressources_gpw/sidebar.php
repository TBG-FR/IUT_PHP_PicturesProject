<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Scripts Javascript -->
<SCRIPT language="javascript">
    function popup(page,nom,option) {
        window.open(page,nom,option);
    }
    /* Permet de revenir à la Page Précédente */
    function goBack() {
        window.history.back();
    }
</SCRIPT>

<div class="text-center" id="returnbutton">
    <button type="button" onclick="goBack()" class="btn btn-default">Retourner à la Page Précédente</button>
</div>

<aside id="sidebar">
                <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"> Laisser un avis </button>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Laisser un Avis</h4>
                  </div>
                  <div class="modal-body">
                      
                      
                    <form action="envoyer.php" method="post" class="col-lg-6">

                    <div class="form-group">
                        <label for="textarea">Laisser un avis :</label>
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

    <div id="avis_show">
        <!--<p>-->  
            <?php
            try {
                $bdd=new PDO ('mysql:host=localhost;dbname=bdd','root','');
            }
            catch (Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }

            $req=$bdd->query('SELECT commentaire,DATE_FORMAT(date_commentaire,\'%d/%m/%Y\') AS date_commentaire_fr FROM commentaires WHERE afficher=1 ORDER BY date_commentaire DESC');
            //$req->execute(array($_GET['billet']));
            while($donnees = $req->fetch())
            {
            ?>
            <div id="separation">
            <div id="commentaireside">
                <?php echo $donnees['commentaire']; ?> <br />
            </div>
            <div id="dateside">
                Le
                <?php echo $donnees['date_commentaire_fr']; ?> <br />
            </div>
                
                </div>
        <div id="entre"></div>
            <br \>
            <?php
            }
            $req->closeCursor();
            ?>
        <!--</p>-->  
    </div>

    <div class="sidebar_btn">
        <a class="btn btn-default" href="contact.html#devis" role="link-button">Devis Gratuit</a>
    </div>

    <div id="avis_show">
        <!--<p>-->
            <?php
            try {
                $bdd=new PDO ('mysql:host=localhost;dbname=bdd','root','');
            }
            catch (Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }

            $req=$bdd->query('SELECT texte,DATE_FORMAT(date,\'%d/%m/%Y\') AS date FROM news ORDER BY date DESC');
            //$req->execute(array($_GET['billet']));
            while($donnees = $req->fetch())
            {
            ?>
            <div id="separation">
            <div id="commentaireside">
                <?php echo $donnees['texte']; ?> <br \>
            </div>
            <div id="dateside">
                Le
                <?php echo $donnees['date']; ?> <br \>
            </div>
                
                </div>
        <div id="entre"></div>
            <br \>
            <?php
            }
            $req->closeCursor();
            ?>
        <!--</p>-->          
    </div>

    <div class="sidebar_btn">
        <a class="btn btn-default" href="contact.html" role="link-button">Contact</a>
    </div>
</aside>

<div id="nosidebar">
    <p>
        Un menu a été caché car votre écran est trop petit pour l'afficher.<br />
        Il contient les avis, les nouveautés, et plusieurs boutons liés.<br />
    </p>
    <div class="text-center">
        <a href="sidebar_only.php" class="btn btn-default">Afficher le menu "Sidebar"</a>    
    </div>
</div>