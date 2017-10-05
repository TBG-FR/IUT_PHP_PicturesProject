<!DOCTYPE html>
<html>
    <head>
        <title>Artheeks - Articles</title>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
    </head>
    <body>
	
<?php
// Connexion à la base de données
mysql_connect("localhost", "geeks_tbg", "486uzfnONjMffMtz1wMg");
mysql_select_db("geeks_artheeks");

// Récupération du nom de la page, sans l'extension
$page = basename($_SERVER['PHP_SELF']);
$page = str_replace( array( '.php', '.htm', '.html' ), '', $page );

// On récupère les news correspondant au type de la page, ordonnées selon la date de publication (affichage limité à 20 news)
$retour = mysql_query('SELECT * FROM news WHERE type="'.$page.'" ORDER BY timestamp DESC LIMIT 0, 20');
while ($donnees = mysql_fetch_array($retour))
{
?>

	<article class="articles">
        <p>
            <p>
                <img src="<?php echo $donnees['miniature']; ?>" class="articles_img">
            
                <h3><center>
                    <?php echo $donnees['titre']; ?>
                </h3></center>
            
                <?php
                    // On enlève les éventuels antislashs, PUIS on crée les entrées en HTML (<br />).
                    $contenu = nl2br(stripslashes($donnees['contenu']));
                    echo $contenu;
                ?>
            </p>
        
            <hr />
                Posté par <?php echo $donnees['auteur'] ?>,
                <em>le <?php echo date('d/m/Y à H\hi', $donnees['timestamp']); ?></em>
                
                <div align="right">
                    <a href="news.php?id=<?php echo $donnees['id'] ?>"> Lire en entier</a>
                </div>
                
        </p>
    </article>
    
<?php
} // Fin de la boucle des news
?>

</body>
</html>