<!DOCTYPE html>
<?php header('Content-Type: text/html; charset=utf8'); ?>

<html>
    <head>
        <! --- Head: Format UTF8, Lien CSS et Titre --- >
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Artheeks - 404</title>
    </head>
   
    <body>
        <header>    <! --- Haut de page --- >
		
            <?php include("header.php"); ?>
			
            <! --- Menu de Navigation --- >    
			
			<?php include("navbar.php"); ?>
            
        </header>
		
        <section>   <! --- Section : Conteneur central du site --- >
		
            <div class="bloc_articles"> <! --- Bloc central --- >

            <! --------------- Début - Page 404 --------------- >

							<p id=erreur>
								Erreur 404<br/>
								La page demandée n'existe pas...<br/><br/>
                                
                                Veuillez vérifier le lien que vous avez suivi<br/><br/>
                                
                                En cas de doute, contactez-nous!
								
								<br/><br/>
								<br/><br/>
								<br/><br/>
							</p>

            <! --------------- Fin - Page 404 --------------- >

            </div>
		
			<! --- Barre latérale : Menus et Accès rapide --- >
			
			<?php include("sidebar.php"); ?>
		
        </section>
    </body>
    
    <footer> <! --- Bas de page --- >
        <?php include("footer.php"); ?>
    </footer>
</html>