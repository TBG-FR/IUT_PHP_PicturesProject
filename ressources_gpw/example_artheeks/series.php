<!DOCTYPE html>
<?php header('Content-Type: text/html; charset=utf8'); ?>

<html>
    <head>
        <! --- Head: Format UTF8, Lien CSS et Titre --- >
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Artheeks - Mangas</title>
    </head>
   
    <body>
        <header>    <! --- Haut de page --- >
		
            <?php include("header.php"); ?>
			
            <! --- Menu de Navigation --- >    
			
			<?php include("navbar.php"); ?>
            
        </header>
		
        <section>   <! --- Section : Conteneur central du site --- >
		
            <div class="bloc_articles"> <! --- Bloc contenant tous les articles --- >
            
                <article class="preface">    <! --- Article de préface --- >
                    <p>
                        Vous retrouverez ici tous les articles concernant les Séries Télévisées.<br />
                       De <em>Breaking Bad</em> à <em>Games of Thrones</em>, en passant par <em>The Big Bang Theory</em>, retrouvez ici vos séries favorites !<br />
                        <em>~~ Bon visionnage ! ~~</em>
                    </p>
                </article>
			
                <?php include("articles.php"); ?> <! --- Affichage de tous les articles concernant les Séries --- >
                
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