<?php session_start(); ?>

<!doctype html>

<html lang="fr">
    
<head>
  <meta charset="utf-8">

  <title>PHP - TP2 - Ex2</title>
  <meta name="description" content="PHP - TP2 - Ex2">
  <meta name="author" content="Tom-Brian Garcia (p1520325)">

  <link href="style.css" rel="stylesheet" media="all" type="text/css">
</head>

<body>
    
    <!-- Début du Formulaire -->
    <form action="login.php" method="post">
        
        <!-- Zone de Texte -->
        Login : <input type="text" name="login"> <br />
        
        <!-- Zone 'Mot de Passe' -->
        Mot de Passe : <input type="password" name="pass"> <br />
        
        <!-- Submit -->
        <input type="submit" value="Envoyer">
        
    </form> <!-- Fin du Formulaire -->
    
</body>
    
</html>