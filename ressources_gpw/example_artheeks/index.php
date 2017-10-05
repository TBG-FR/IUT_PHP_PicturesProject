<!DOCTYPE html>
<?php header('Content-Type: text/html; charset=utf8'); ?>

<html>
    <head>
        <! --- Head: Format UTF8, Lien CSS et Titre --- >
        <meta charset="utf-8" /> <! Encodage de la page (Accents et caractères spéciaux) >
        <link rel="stylesheet" href="style.css" /> <! Fichier CSS lié >
        <title>Artheeks - Accueil</title> <! Titre de la page >
    </head>
   
    <body>
        <header>    <! --- Haut de page --- >
		
            <?php include("header.php"); ?> <! Inclure le fichier header.php >
			
            <! --- Menu de Navigation --- >    
			
			<?php include("navbar.php"); ?>
            
        </header>
		
        <section>   <! --- Section : Conteneur central du site --- >
		
            <div class="bloc_articles"> <! --- Bloc contenant tous les articles --- >
            
                <article class="preface">    <! --- Article de préface --- >
                    <p> <! Balise de paragraphe >
                        Artheeks est un site basé sur  différents contenus multimédias, tels que les Jeux-Vidéo, les Films, les Séries et les Mangas.<br />
                        Le site proposera des présentations, des avis mais aussi des actualités récentes dans ces domaines, rédigés par nos soins.<br />
                        <em>~~ Bonne visite ! ~~</em>
                    </p>
                </article>
			
                <?php include("index_articles.php"); ?> <! --- Affichage de tous les articles --- >
				
            </div>
		
			<! --- Barre latérale : Menus et Accès rapide --- >
		
			<?php include("sidebar_secret.php"); ?>
			<?php include("sidebar.php"); ?>
		
        </section>
    </body>
    
    <footer> <! --- Bas de page --- >
        <?php include("footer.php"); ?>
    </footer>
</html>