<!-- index.php ~ Homepage -->

<?php

session_start(); // Session Creation or Recovery

// require_once(""); // COMMENT

?>

<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>Andrew Blind - Professional Photographer - Home</title>
        <!-- <meta name="description" content=""> -->
        <!-- <meta name="author" content=""> -->

        <!-- CSS : Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="all" type="text/css">

        <!-- CSS : Custom -->
        <link href="css/style.css" rel="stylesheet" media="all" type="text/css">

        <!-- Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </head>

    <body>

        <header>
            <?php include_once("header.php"); ?>
            <?php include_once("navbar.php"); ?>
        </header>

        <div class="content">

            <!-- Short Description -->
            <p class="short_text">
                I'm Andrew Blind, a professional photographer since 2012, located in the USA.
                Welcome to my Website, where you can have a look at my pictures, and even buy them if you like them and want to support my work !
                Don't hesitate to contact me for any questions or inquiries ~
            </p>

            <!-- Slider "Carousel" -->

            <div class="Carousel_container">
                <div id="Carousel_Index" class="carousel slide" data-ride="carousel">

                    <!-- Boutons de Navigation [MANAGE_WITH_PHP] -->
                    <ol class="carousel-indicators">
                        <li data-target="#Carousel_Index" data-slide-to="0" class="active"></li>
                        <li data-target="#Carousel_Index" data-slide-to="1"></li>
                        <li data-target="#Carousel_Index" data-slide-to="2"></li>
                        <li data-target="#Carousel_Index" data-slide-to="3"></li>
                    </ol>

                    <!-- Div containing Slides [MANAGE_WITH_PHP] -->
                    <div class="carousel-inner">

                        <!-- Slide #1 (Active) -->
                        <div class="item active item-1">
                            <!-- Image de la Slide -->
                            <div class="carousel-caption">
                                TITLE/DESCRIPTION
                            </div>
                        </div>                            

                        <!-- Slide #2 -->
                        <div class="item item-2">
                            <!-- Image de la Slide -->
                            <div class="carousel-caption">
                                TITLE/DESCRIPTION
                            </div>
                        </div>

                        <!-- Slide #3 -->
                        <div class="item item-3">
                            <!-- Image de la Slide -->
                            <div class="carousel-caption">
                                TITLE/DESCRIPTION
                            </div>
                        </div>
                    </div>

                    <!-- "Previous" & "Next" Buttons -->
                    <a class="left carousel-control" href="#Carousel_Charpente" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#Carousel_Charpente" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <!-- Link to Gallery -->

        </div>

        <footer>
            <?php include_once("footer.php"); ?>
        </footer>

    </body>

</html>