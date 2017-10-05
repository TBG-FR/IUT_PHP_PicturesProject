<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Réalisations - Ducrozet-Moninot</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="style_global.css">
        <link rel="stylesheet" href="style.css">
        <!-- Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Scripts Javascript -->
        <SCRIPT language="javascript">
            $(document).ready(function(){
                $(".filter-button").click(function(){
                    var value = $(this).attr('data-filter');
                    if(value == "all")
                    {
                        //$('.filter').removeClass('hidden');
                        $('.filter').show('1000');
                    }
                    else
                    {
                        //            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
                        //            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
                        $(".filter").not('.'+value).hide('3000');
                        $('.filter').filter('.'+value).show('3000');

                    }
                });

                if ($(".filter-button").removeClass("active")) {
                    $(this).removeClass("active");
                }
                $(this).addClass("active");

            });
        </SCRIPT>

    </head>


    <body>
        <header>

            <?php include("header.php"); ?>

            <?php include("navbar.php"); ?>

        </header>

        <div id="main">

            <section id="content">

                <div id="gallery_buttons">
                    <button class="btn btn-default filter-button" data-filter="all">Tout</button>
                    <button class="btn btn-default filter-button" data-filter="charpente">Charpente et Couverture</button>
                    <button class="btn btn-default filter-button" data-filter="facade">Facade</button>
                    <button class="btn btn-default filter-button" data-filter="maconnerie">Maçonnerie</button>
                    <button class="btn btn-default filter-button" data-filter="maison">Maisons Individuelles</button>
                </div>                

                <div class="gallery filter charpente">
                    <a target="_blank" href="images/vrac/charpente01.jpg">
                        <img src="images/vrac/charpente01.jpg" alt="réalisation 2012">
                    </a>
                </div>

                <div class="gallery filter charpente">
                    <a target="_blank" href="images/vrac/charpente02.jpg">
                        <img src="images/vrac/charpente02.jpg" alt="Bourg-enBresse 2008">
                    </a>
                </div>

                <div class="gallery filter charpente">
                    <a target="_blank" href="images/vrac/charpente03.jpg">
                        <img src="images/vrac/charpente03.jpg" alt="Bip bap boup">
                    </a>
                </div>

                <div class="gallery filter charpente">
                    <a target="_blank" href="images/vrac/charpente04.jpg">
                        <img src="images/vrac/charpente04.jpg" alt="Ex photo de background">
                    </a>
                </div>

                <div class="gallery filter facade">
                    <a target="_blank" href="images/vrac/facade01.jpg">
                        <img src="images/vrac/facade01.jpg">
                    </a>
                </div>


                <div class="gallery filter facade">
                    <a target="_blank" href="images/vrac/facade02.JPG">
                        <img src="images/vrac/facade02.JPG">
                    </a>
                </div>

                <div class="gallery filter facade">
                    <a target="_blank" href="images/vrac/facade03.jpg">
                        <img src="images/vrac/facade03.jpg">
                    </a>
                </div>

                <div class="gallery filter facade">
                    <a target="_blank" href="images/vrac/facade04.JPG">
                        <img src="images/vrac/facade04.JPG">
                    </a>
                </div>

                <div class="gallery filter facade">
                    <a target="_blank" href="images/vrac/facade05.jpg">
                        <img src="images/vrac/facade05.jpg">
                    </a>
                </div>

                <div class="gallery filter facade">
                    <a target="_blank" href="images/vrac/facade06.JPG">
                        <img src="images/vrac/facade06.JPG">
                    </a>
                </div>

                <div class="gallery  filter facade">
                    <a target="_blank" href="images/vrac/facade07.JPG">
                        <img src="images/vrac/facade07.JPG">
                    </a>
                </div>

                <div class="gallery filter facade">
                    <a target="_blank" href="images/vrac/facade08.JPG">
                        <img src="images/vrac/facade08.JPG">
                    </a>
                </div>

                <div class="gallery filter facade">
                    <a target="_blank" href="images/vrac/facade09.JPG">
                        <img src="images/vrac/facade09.JPG">
                    </a>
                </div>

                <div class="gallery filter maconnerie">
                    <a target="_blank" href="images/vrac/maconnerie01.jpg">
                        <img src="images/vrac/maconnerie01.jpg">
                    </a>
                </div>

                <div class="gallery filter maconnerie">
                    <a target="_blank" href="images/vrac/maconnerie02.jpg">
                        <img src="images/vrac/maconnerie02.jpg">
                    </a>
                </div>

                <div class="gallery filter maconnerie">
                    <a target="_blank" href="images/vrac/maconnerie03.jpg">
                        <img src="images/vrac/maconnerie03.jpg">
                    </a>
                </div>

                <div class="gallery filter maconnerie">
                    <a target="_blank" href="images/vrac/maconnerie04.jpg">
                        <img src="images/vrac/maconnerie04.jpg">
                    </a>
                </div>

                <div class="gallery filter maconnerie">
                    <a target="_blank" href="images/vrac/maconnerie05.jpg">
                        <img src="images/vrac/maconnerie05.jpg">
                    </a>
                </div>

                <div class="gallery filter maconnerie">
                    <a target="_blank" href="images/vrac/maconnerie06.jpg">
                        <img src="images/vrac/maconnerie06.jpg">
                    </a>
                </div>

                <div class="gallery filter maconnerie">
                    <a target="_blank" href="images/vrac/maconnerie07.jpg">
                        <img src="images/vrac/maconnerie07.jpg">
                    </a>
                </div>

                <div class="gallery filter maison">
                    <a target="_blank" href="images/vrac/maison01.jpg">
                        <img src="images/vrac/maison01.jpg">
                    </a>
                </div>

                <div class="gallery filter maison">
                    <a target="_blank" href="images/vrac/maison02.jpg">
                        <img src="images/vrac/maison02.jpg">
                    </a>
                </div>

                <div class="gallery filter maison">
                    <a target="_blank" href="images/vrac/maison03.jpg">
                        <img src="images/vrac/maison03.jpg">
                    </a>
                </div>

                <div class="gallery filter maison">
                    <a target="_blank" href="images/vrac/maison04.jpg">
                        <img src="images/vrac/maison04.jpg">
                    </a>
                </div>

                <div class="gallery filter maison">
                    <a target="_blank" href="images/vrac/maison05.png">
                        <img src="images/vrac/maison05.png">
                    </a>
                </div>

                <div class="gallery filter maison">
                    <a target="_blank" href="images/vrac/maison06.JPG">
                        <img src="images/vrac/maison06.JPG">
                    </a>
                </div>

                <div class="gallery filter maison">
                    <a target="_blank" href="images/vrac/maison07.JPG">
                        <img src="images/vrac/maison07.JPG">
                    </a>
                </div>



            </section>

            <?php include("sidebar.php"); ?> <! Inclure le fichier "sidebar.php" >

        </div>

        <footer>
            <?php include("footer.php"); ?>
        </footer>

    </body>    
</html>