<?php

    require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start + Disconnection Management    

?>

<!-- 'index.php' ~ Homepage -->

<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>Andrew Blind - Professional Photographer - Home</title>
        <!-- <meta name="description" content=""> -->
        <!-- <meta name="author" content=""> -->

        <?php include_once("head.php"); // Make all the CSS & JavaScript links ?>

    </head>

    <body>

        <header>
            <?php include_once("header.php"); ?>
            <?php include_once("navbar.php"); ?>
        </header>

        <div class="content">

             <!-- Short Description -->
            <p class="short_text">
                I'm Andrew Blind, a professional photographer since 2012, located in the USA. <br />
                Welcome to my Website, where you can have a look at my pictures, and even buy them if you like them and want to support my work ! <br />
                Don't hesitate to contact me for any questions or inquiries ~ <br />
            </p>

            <!-- Carousel / Slider -->
            <div class="Carousel_container">
            <img src="public_images/observation_deck___wallpaper_by_z_design-d2q7jic.jpg" alt="" title="" height="250px"></div>

            <!-- Link to Gallery -->
            <h3><a href="gallery.php">See/Buy all my Pictures</a></h3>
			
			<?php
            
            //include_once("classes/all.inc.php");
			
			$db = new Database();
			
			/*$req = $db->query('SELECT * FROM phpproj_user');
			foreach ($req as $champ => $valeur)
				echo $champ.' --- '.$valeur.'<br />';
				
			print_r($req);*/
			print_r($db);
			
			$res = $db->read($bdd_table_user);
			
			var_dump($res);
		/*
			foreach ($res as $row=>$entry) {
				foreach ($entry as $field=>$entry) {
					echo $field."---".$value."<br />";
			}}*/
			
			// Lecture de chaque ligne du tableau
			foreach($res as $ligne){
        // Lecture de chaque tableau de chaque ligne
				foreach($ligne as $cle=>$valeur){
                // Affichage
				echo $cle.': '.$valeur.'<br>';
				}
			}
				
			?>

        </div>

        <footer>
            <?php include_once("footer.php"); ?>
        </footer>

    </body>

</html>