<!DOCTYPE html>
<html>    
    <head>
        <meta charset="utf-8">

        <title>Contact - Ducrozet-Moninot</title>

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

                <div id="contact">
                    <h1>Nous contacter</h1>

                    <div id="contact_informations">
                        <!-- <h2>Informations de contact</h2> -->

                        <div class="c_info_element">
                            <div class="glyphicon glyphicon-earphone" aria-label="Icône Contact : Téléphone Fixe"></div>
                            <div>04 74 23 27 61</div>
                        </div>

                        <div class="c_info_element">
                            <div class="glyphicon glyphicon-phone" aria-label="Icône Contact : Téléphone Portable"></div>
                            <div>06 66 16 68 03</div>
                        </div>

                        <div class="c_info_element">
                            <div class="glyphicon glyphicon-map-marker" aria-label="Icône Contact : Localisation"></div>
                            <div>99 Chemin de l'Étang Neuf <br />01000 Saint-Denis-les-Bourg</div>
                        </div>

                        <div class="c_info_element">
                            <div class="glyphicon glyphicon-envelope" aria-label="Icône Contact : Mail"></div>
                            <div>contact@ducrozet-moninot.fr</div>
                        </div>

                        <!-- <div class="c_info_element">
                            <img src="images/carte.png" id="logo" alt="TODO" title="TODO">
                        </div> -->
                    </div>

                    <div id="contact_formulaire">
                        <!-- <h2>Nous envoyer un message</h2> -->
                        <form action="#"> <!-- /contact_send.php -->

                            <label for="name">Prénom et Nom</label>
                            <input type="text" id="name" name="name" placeholder="Votre prénom et nom...">

                            <label for="enterprise">Société</label>
                            <input type="text" id="enterprise" name="enterprise" placeholder="Le nom de votre société...">

                            <label for="sujet">Sujet</label>
                            <select id="sujet" name="type">
                                <option value="contact">Demande d'informations</option>
                                <option value="devis">Demande de Devis</option>
                                <option value="usa">Demande Commerciale</option>
                                <option value="usa">Autre ...</option>
                            </select>

                            <label for="subject">Texte</label>
                            <textarea id="text" name="text" placeholder="Décrivez votre demande..." style="height:200px"></textarea>

                            <input type="submit" value="Envoyer">

                        </form>
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