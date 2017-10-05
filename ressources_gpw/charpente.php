<!DOCTYPE html>
<html>    
    <head>
        <meta charset="utf-8">

        <title>Travaux de Charpente et Couverture - Ducrozet-Moninot</title>

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
                <h1>Charpente et Couverture</h1>

                <div class="description">
                    <p>                        
                        Les charpentiers de chez <em>Ducrozet-Moninot</em> assurent la pose de charpentes et de couvertures sur bâtiment neuf ou ancien depuis 15 ans maintenant dans la région de Bourg en Bresse.
                        <br /><br />
                        Que ce soit en neuf ou en rénovation, nous vous proposons des <strong>solutions adaptées</strong> à vos exigences, dans le <strong>respect de votre budget</strong>.
                        <br />
                    </p>
                    <div>
                        <!-- <h3>Travaux de Charpente - Couverture :</h3> -->
                        <ul>
                            <li>Réfection complète de charpente et couverture.</li>
                            <li>Rénovation d'ancienne toiture.</li>
                            <li>Pose de charpente traditionnelle et industrielle type "fermette" sur maçonnerie neuve.</li>
                            <li>Pose de tous types de tuiles en terre cuite (plates et galbées).</li>
                            <li>Pose d'écran de sous toiture et d'isolants minces sur chevrons.</li>
                            <li>Pose de Sarking sur chevrons pour isolation de toiture.</li>
                            <li>Pose de Bardage Bois ou PVC.</li>
                            <li>Pose de Frisette PVC ou Bois sous forget.</li>
                            <li>Création de auvent ou préau en charpente traditionnelle. </li>
                        </ul>
                    </div>

                    <p class="conclusion">                        
                        Nous vous accompagnerons tout au long de vos projets et nous vous livrerons des réalisations de qualité à la hauteur de vos attentes !
                    </p>

                </div>

                <!-- Carousel (Images qui défilent) -->
                <div class="Carousel_container">
                    <div id="Carousel_Charpente" class="carousel slide" data-ride="carousel">

                        <!-- Boutons de Navigation -->
                        <ol class="carousel-indicators">
                            <li data-target="#Carousel_Charpente" data-slide-to="0" class="active"></li>
                            <li data-target="#Carousel_Charpente" data-slide-to="1"></li>
                            <li data-target="#Carousel_Charpente" data-slide-to="2"></li>
                            <li data-target="#Carousel_Charpente" data-slide-to="3"></li>
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
                        <a class="left carousel-control" href="#Carousel_Charpente" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Précédent</span>
                        </a>
                        <a class="right carousel-control" href="#Carousel_Charpente" data-slide="next">
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