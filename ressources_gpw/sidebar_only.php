<!DOCTYPE html>
<html>    
    <head>
        <meta charset="utf-8">

        <title>Menu 'Sidebar' - Ducrozet-Moninot</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="style_global.css">
        <link rel="stylesheet" href="style_sidebaronly.css">
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

            <?php include("sidebar.php"); ?>

        </div>

        <footer>
            <?php include("footer.php"); ?>
        </footer>

    </body>    
</html>