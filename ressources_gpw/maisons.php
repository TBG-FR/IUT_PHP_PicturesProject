<!DOCTYPE html>
<html>    
    <head>
        <meta charset="utf-8">

        <title>Maisons Individuelles - Ducrozet-Moninot</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="style_global.css">
        <link rel="stylesheet" href="style.css">
        <!-- Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </head>


    <body>
        <header>

            <?php include("header.php"); ?>

            <?php include("navbar.php"); ?>

        </header>

        <div id="main">

            <section id="content">
                <h1>Maisons individuelles et Extensions</h1>

                <div class="description">
                    <p> 
                        <em>Ducrozet-Moninot</em> construit des maisons individuelles dans la région de Bourg-en-Bresse depuis plus de 16 ans. Nous vous mettons en relation avec des <strong>architectes ou maîtres d'ouvrage locaux</strong> pour l'élaboration des plans, le permis de construire et la conception de votre villa.
                        <br /><br />
                        Notre <strong>réseau d'entreprises locales</strong> dans les autres corps de métiers (électriciens, plombiers, menuisiers, carreleurs, plâtriers-peintres, …) est une réelle <strong>garantie de qualité</strong> pour la réalisation de votre construction, car ce sont des <strong>entreprises connues et réputées</strong>, et de vrais artisans locaux avec qui nous travaillons régulièrement.
                        <br />
                    </p>
                    <div>
                        <!-- <h3>Travaux sur Maisons Individuelles :</h3> -->
                        <ul>
                            <li>Réalisation dans les règles de l’art respectant les normes actuelles.</li>
                            <li>Réalisation continue de la maçonnerie à la toiture.</li>
                            <li>Rapidité et simplicité de gestion du gros oeuvre.</li>
                            <li>Respect de votre budget et écoute de vos attentes.</li>
                            <li>Conseil dans le choix des différents matériaux constituant votre maison</li>
                        </ul>
                    </div>

                    <p class="conclusion">                        
                        Confier la réalisation de votre maison à notre entreprise, c'est vous assurer des artisans à l'écoute et une prestation de qualité !
                    </p>

                </div>

                <!-- Carousel (Images qui défilent) -->
                <div class="Carousel_container">
                    <div id="Carousel_Maisons" class="carousel slide" data-ride="carousel">

                        <!-- Boutons de Navigation -->
                        <ol class="carousel-indicators">
                            <li data-target="#Carousel_Maisons" data-slide-to="0" class="active"></li>
                            <li data-target="#Carousel_Maisons" data-slide-to="1"></li>
                            <li data-target="#Carousel_Maisons" data-slide-to="2"></li>
                            <li data-target="#Carousel_Maisons" data-slide-to="3"></li>
                        </ol>

                        <!-- Div qui contient/recadre les Slides -->
                        <div class="carousel-inner">

                            <!-- Slide #1 (Actif) -->
                            <div class="item active item-1">
                                <!-- Image de la Slide -->
                                <div class="carousel-caption">
                                    <!-- Bouton sur la Slide -->
                                    <a class="btn btn-default" href="galerie.php" role="TODO">► Tout voir ◄</a>
                                </div>
                            </div>                            

                            <!-- Slide #2 -->
                            <div class="item item-2">
                                <!-- Image de la Slide -->
                                <div class="carousel-caption">
                                    <!-- Bouton sur la Slide -->
                                    <a class="btn btn-default" href="galerie.php" role="TODO">► Tout voir ◄</a>
                                </div>
                            </div>

                            <!-- Slide #3 -->
                            <div class="item item-3">
                                <!-- Image de la Slide -->
                                <div class="carousel-caption">
                                    <!-- Bouton sur la Slide -->
                                    <a class="btn btn-default" href="galerie.php" role="TODO">► Tout voir ◄</a>
                                </div>
                            </div>

                            <!-- Slide #3 -->
                            <div class="item item-4">
                                <!-- Image de la Slide -->
                                <div class="carousel-caption">
                                    <!-- Bouton sur la Slide -->
                                    <a class="btn btn-default" href="galerie.php" role="TODO">► Tout voir ◄</a>
                                </div>
                            </div>
                        </div>

                        <!-- Boutons "Suivant" & "Précédent" -->
                        <a class="left carousel-control" href="#Carousel_Maisons" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Précédent</span>
                        </a>
                        <a class="right carousel-control" href="#Carousel_Maisons" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Suivant</span>
                        </a>
                    </div>
                </div>

            </section>

            <?php include("sidebar.php"); ?>

        </div>

        <footer>
            <?php include("footer.php"); ?>
        </footer>

    </body>    
</html>
