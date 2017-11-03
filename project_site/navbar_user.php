<!-- ------ "Navbar" : Menu de Navigation ------ -->
<div class="collapse menu">
    <ul class="list-inline">
        <li><a href="index.php">Home</a></li>
        <li><a href="public_gallery.php">Gallery</a></li>
        <li><a href="login.php">Account</a></li>
        <li><a href="cart.php">Cart (<?php echo $_SESSION['cart']->getNbPictures(); ?>)</a></li>
        <li><a href="login.php?action=disconnect&source=<?php echo basename($_SERVER['PHP_SELF']); ?>">Logout</a></li>
    </ul>
</div>
<!-- ------ "Navbar" : Fin du Bloc ------ -->