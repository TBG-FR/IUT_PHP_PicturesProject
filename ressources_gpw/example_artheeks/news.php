<!DOCTYPE html>
<?php header('Content-Type: text/html; charset=utf8'); ?>

<html>
    <head>
        <! --- Head: Format UTF8, Lien CSS et Titre --- >
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Artheeks - Accueil</title>
    </head>
   
    <body>
        <header>    <! --- Haut de page --- >
		
            <?php include("header.php"); ?>
			
            <! --- Menu de Navigation --- >    
			
			<?php include("navbar.php"); ?>
            
        </header>
		
        <section>   <! --- Section : Conteneur central du site --- >
		
            <div class="bloc_articles"> <! --- Bloc contenant tous les articles --- >

            <! --------------- Début - Affichage de la News Unique --------------- >

<?php
// Connexion à la base de données
mysql_connect("localhost", "geeks_tbg", "486uzfnONjMffMtz1wMg");
mysql_select_db("geeks_artheeks");

$id = mysql_real_escape_string($_GET['id']); // Récupérer l'ID dans l'URL

$retour = mysql_query('SELECT * FROM news WHERE `id` = '.$id.' '); // Récupérer la News avec l'ID obtenu
if ($donnees = mysql_fetch_array($retour)) // (IF/SI) il y a un ID, afficher l'article
{
?>

	<article class="article_u">
    
        <h2 class="article_u_titre">
            <?php echo $donnees['titre']; ?>
        </h2>
        
        <p class="article_u_texte">            
            <?php
            // On enlève les éventuels antislashs, PUIS on crée les entrées en HTML (<br />).
            $contenu = nl2br(stripslashes($donnees['contenu']));
            echo $contenu;
            ?>
        </p>
        
        <hr />
        <p class="article_u_données">
            Cet article a été posté par <?php echo $donnees['auteur'] ?>
            <em>le <?php echo date('d/m/Y à H\hi', $donnees['timestamp']); ?></em>
        </p>
        
    </article>
    
<?php // (ELSE/SINON) [Si aucun ID n'est envoyé] : Redirection 404
} 
else
{
    header("Location: 404.php");
    exit;
}
?>

            <! --------------- Fin - Affichage de la News Unique --------------- >

            </div>
		
			<! --- Barre latérale : Menus et Accès rapide --- >
		
			<?php include("sidebar.php"); ?>
		
        </section>
    </body>
    
    <footer> <! --- Bas de page --- >
        <?php include("footer.php"); ?>
    </footer>
</html>