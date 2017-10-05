<!DOCTYPE html>
<html>    
    <head>
        <meta charset="utf-8">

        <title>Travaux de Maçonnerie - Ducrozet-Moninot</title>

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
                <h1>Travaux de Maçonnerie</h1>

                <div class="description">
                    <p>                        
                        <em>Ducrozet-Moninot</em> met son expérience et ses compétences à votre service pour concrétiser vos projets de <strong>construction</strong> ou de <strong>rénovation</strong> divers et variés.
                        <br /><br />
                        Un large éventail de prestations est réalisé par nos artisans dans divers domaines.
                        <br />
                    </p>
                    <div>
                        <!-- <h3>Travaux de Maçonnerie :</h3> -->
                        <ul>
                            <li>Construction de maisons individuelles (Nous proposons une <a href="maisons.php">réalisation complète du gros oeuvre de votre villa</a>).</li>
                            <li>Extensions de maison (Extension traditionnelle, Toiture, Terrasse, ...).</li>
                            <li>Rénovation de bâtiments anciens (Démolition et Rénovation).</li>
                            <li>Ouverture en sous œuvre (Mur porteur ou non, mise en place IPN ou HEA).</li>
                            <li>Construction de piscines en béton armé.</li>
                            <li>Réalisations : Mur de clôture, terrasse, auvent, garage, ...</li>
                        </ul>
                    </div>

                    <p class="conclusion">
                        <!-- N'hésitez pas à nous contacter pour de plus amples informations, ou même à nous demander un devis détaillé et gratuit ! -->
                        N'hésitez pas à nous contacter pour de plus amples informations, ou demandez-nous un devis détaillé et gratuit !
                    </p>

                </div>

                <!-- Carousel (Images qui défilent) -->
                <div class="Carousel_container">
                    <div id="Carousel_Maconnerie" class="carousel slide" data-ride="carousel">

                        <!-- Boutons de Navigation -->
                        <ol class="carousel-indicators">
                            <li data-target="#Carousel_Maconnerie" data-slide-to="0" class="active"></li>
                            <li data-target="#Carousel_Maconnerie" data-slide-to="1"></li>
                            <li data-target="#Carousel_Maconnerie" data-slide-to="2"></li>
                            <li data-target="#Carousel_Maconnerie" data-slide-to="3"></li>
                        </ol>

                        <!-- Div qui contient/recadre les Slides -->
                        <div class="carousel-inner">

                            <!-- Slide #1 (Actif) -->
                            <div class="item active item-1">
                                <!-- Image de la Slide -->
                                <!-- <img src="images/maconnerie/carousel/q1.jpg" alt="TODO" title="TODO" >  OLD WAY -->
                                <div class="carousel-caption">
                                    <!-- Bouton sur la Slide -->
                                    <a class="btn btn-default" href="galerie.php" role="TODO">► Tout voir ◄</a>
                                </div>
                            </div>                            

                            <!-- Slide #2 -->
                            <div class="item item-2">
                                <!-- Image de la Slide -->
                                <!-- <img src="images/maconnerie/carousel/q2.jpg" alt="TODO" title="TODO" >  OLD WAY -->
                                <div class="carousel-caption">
                                    <!-- Bouton sur la Slide -->
                                    <a class="btn btn-default" href="galerie.php" role="TODO">► Tout voir ◄</a>
                                </div>
                            </div>

                            <!-- Slide #3 -->
                            <div class="item item-3">
                                <!-- Image de la Slide -->
                                <!-- <img src="images/maconnerie/carousel/q3.jpg" alt="TODO" title="TODO" >  OLD WAY -->
                                <div class="carousel-caption">
                                    <!-- Bouton sur la Slide -->
                                    <a class="btn btn-default" href="galerie.php" role="TODO">► Tout voir ◄</a>
                                </div>
                            </div>

                            <!-- Slide #3 -->
                            <div class="item item-4">
                                <!-- Image de la Slide -->
                                <!-- <img src="images/maconnerie/carousel/q4.jpg" alt="TODO" title="TODO" >  OLD WAY -->
                                <div class="carousel-caption">
                                    <!-- Bouton sur la Slide -->
                                    <a class="btn btn-default" href="galerie.php" role="TODO">► Tout voir ◄</a>
                                </div>
                            </div>
                        </div>

                        <!-- Boutons "Suivant" & "Précédent" -->
                        <a class="left carousel-control" href="#Carousel_Maconnerie" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Précédent</span>
                        </a>
                        <a class="right carousel-control" href="#Carousel_Maconnerie" data-slide="next">
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