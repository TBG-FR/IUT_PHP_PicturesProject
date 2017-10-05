<!DOCTYPE html>
<html>    
    <head>
        <meta charset="utf-8">

        <title>Accueil - Ducrozet-Moninot</title>

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

        <div id="main main_home">
            <div id="accueil">
                <div class=container-fluid>
                    <div class="HOME">

                        <map name="map1">
                            <area href="maconnerie.php" shape="rect" coords="0,152,140,80" title="Maçonnerie" tabindex="0" />
                            <area href="charpente.php" shape="rect" coords="0,100,50,100" title="Charpente" tabindex="0"/>
                            <area href="facade.php" shape="rect" coords="2,10,20,110" title="Façade" tabindex="0"/>
                            <area href="maisons.php" shape="rect" coords="0,30,100,130" title="Maison" tabindex="0"/>
                        </map>

                        <img src="images/accueil.png" usemap="#map1" alt="TODO" title="TODO">

                    </div>
                </div>
            </div>
        </div>

        <footer>
            <?php include("footer.php"); ?>
        </footer>

    </body>    
</html>