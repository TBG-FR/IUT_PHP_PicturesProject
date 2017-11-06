<?php

    require_once("classes/all.inc.php"); // Include all the Classes & Functions & Co + Session Start + Disconnection Management    

?>

<html>
   <head>
      <title>Stock d'images</title>
   </head>
   <body>
      <h3>Envoi d'une image</h3>
      <form action="upload_image.php" enctype="multipart/form-data"  method="post">
         <input type="file" name="pic" required>
         <input type="submit" value="Envoyer" >
      </form>
   </body>
</html>
