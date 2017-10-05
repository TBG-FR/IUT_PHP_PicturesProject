<!DOCTYPE html>
<html>    
    <head>
        <meta charset="utf-8">

        <title>Ravalement de Façades - Ducrozet-Moninot</title>

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
                <h1>Ravalement de Façades</h1>

                <div class="description">
                    <p>                        
                        L'entreprise <em>Ducrozet-Moninot</em> réalise tous les travaux de ravalement de façade qui permettent la remise en état des murs extérieurs de votre bâtiment.
                        <br /><br />
                        Nous ravalons votre façade avec des enduits spéciaux <strong>pour chaque type de support</strong> : pisé, pierre ou matériaux récents (moellons, briques, blocs de béton cellulaire).
                    </p>
                    <div class="desc_list">
                        <!-- <h3>Travaux de Ravalement de Façade :</h3> -->
                        <ul>
                            <li>Ravalement de façade sur support ancien (pisé, pierre...).</li>
                            <li>Réalisation de façade sur maçonneries neuves. (briques, moellons..).</li>
                            <li>Restauration de murs en Colombage.</li>
                            <li>Large choix de coloris d'enduits.</li>
                            <li>2 types de finitions d'enduit : gratté et frisé fin.</li>
                        </ul>
                    </div>

                    <p class="conclusion">                        
                        Choisir notre société pour votre façade, c'est faire le choix de la qualité, dans le respect des normes actuelles !
                    </p>

                </div>

                <!-- Carousel (Images qui défilent) -->
                <div class="Carousel_container">
                    <div id="Carousel_Facade" class="carousel slide" data-ride="carousel">

                        <!-- Boutons de Navigation -->
                        <ol class="carousel-indicators">
                            <li data-target="#Carousel_Facade" data-slide-to="0" class="active"></li>
                            <li data-target="#Carousel_Facade" data-slide-to="1"></li>
                            <li data-target="#Carousel_Facade" data-slide-to="2"></li>
                            <li data-target="#Carousel_Facade" data-slide-to="3"></li>
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
                        <a class="left carousel-control" href="#Carousel_Facade" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Précédent</span>
                        </a>
                        <a class="right carousel-control" href="#Carousel_Facade" data-slide="next">
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
