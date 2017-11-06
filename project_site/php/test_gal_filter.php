<?php

require_once("classes/all.inc.php");

?>

<!-- gallery.php ~ Displays the public gallery (without login, and with watermarked pictures) -->

<!doctype html>

<html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>Andrew Blind - Professional Photographer - Gallery</title>
        <!-- <meta name="description" content=""> -->
        <!-- <meta name="author" content=""> -->

        <?php include_once("head.php"); // Make all the CSS & JavaScript links ?>

    </head>

    <body>

        <header>
        </header>

        <div class="content">

            <div class="gallery">

                <div class="container">
                    <div class="row">
                        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h1 class="gallery-title">Gallery</h1>
                        </div>

                        <div align="center">
                            <button class="btn btn-default filter-button" data-filter="all">All</button>
                            <button class="btn btn-default filter-button" data-filter="hdpe">HDPE Pipes</button>
                            <button class="btn btn-default filter-button" data-filter="sprinkle">Sprinkle Pipes</button>
                            <button class="btn btn-default filter-button" data-filter="spray">Spray Nozzle</button>
                            <button class="btn btn-default filter-button" data-filter="irrigation">Irrigation Pipes</button>
                        </div>
                        <br/>
                        

                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe sprinkle">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle irrigation">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <footer>
        </footer>

    </body>

</html>