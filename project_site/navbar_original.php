<?php

if( isset($_SESSION['cart']) ) { $cart_items=$_SESSION['cart']->getNbPictures(); }
else { $cart_items="0"; }

?>

<!-- ------ "Navbar" : Menu de Navigation ------ -->
<div class="collapse menu hline-bottom">
    <ul class="list-inline">
        <li><a href="index.php">Home</a></li>
        <li><a href="public_gallery.php">Gallery</a></li>
        <li><a href="cart.php">Cart (<?php echo $cart_items; ?>)</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>
</div>
<!-- ------ "Navbar" : Fin du Bloc ------ -->