<!DOCTYPE html>
<?php header('Content-Type: text/html; charset=utf8'); ?>

<html>
    <head>
        <! --- Head: Format UTF8, Lien CSS et Titre --- >
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Artheeks - Informations & Contact</title>
    </head>
   
    <body>
        <header>    <! --- Haut de page --- >
		
            <?php include("header.php"); ?>
			
            <! --- Menu de Navigation --- >    
			
			<?php include("navbar.php"); ?>
            
        </header>
		
        <section>   <! --- Section : Conteneur central du site --- >
		
            <div class="bloc_articles"> <! --- Bloc central --- >

            <! --------------- Début - Page Info --------------- >

            <article class="article_u">
                <p class="bloc_auteur">
                    <h3>Les Auteurs</h3><br/>
                    
                <p class="info_auteur">
                    <div class="nom_auteur">Tom Brian</div></br>
                    17 ans</br>
                    Terminale S-SI option Informatique et Science du Numérique</br>
                    Languages informatique : Python, HTML 5, CSS 3, PHP, MySQL</br>
                    Co-fondateur du site Artheeks. Gère l'hébergement, les éléments généraux du site, le système d'articles et la partie Jeux-Vidéo.</br>
                </p><hr/>
                
                <p class="info_auteur">
                    <div class="nom_auteur">Valentin</div></br>
                    17 ans</br>
                    Terminale S-SI option Informatique et Science du Numérique</br>
                    Languages informatique : Python, HTML 5, CSS 3</br>
                    Co-fondateur du site Artheeks. Gère le design des articles et la partie Séries .</br>
                </p><hr/>
                
                <p class="info_auteur">
                    <div class="nom_auteur">Cyril</div></br>
                    17 ans</br>
                    Terminale S-SI option Informatique et Science du Numérique</br>
                    Languages informatique : Python, HTML 5, CSS 3</br>
                    Co-fondateur du site Artheeks. Gère la Sidebar, le Footer, la partie Mangas et Information et Contact.</br>
                </p><hr/></br>
				
					<h3>Contact</h3></br>
					Adresse mail : contact@artheeks.tk
                
                </p>
            </article>

            <! --------------- Fin - Page Info --------------- >

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