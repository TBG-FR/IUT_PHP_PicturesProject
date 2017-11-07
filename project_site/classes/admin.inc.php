<?php   // File "admin.inc.php" : Deletion and edition (by GET Method), included on each page

$db=new Database();

if ( $_GET ) {

    // Some useful variable(s) here

    /* --------------------------------------------------------------------- */

    // If the User clicked on "Edit"
    if ($_GET['action'] == 'edit') {
        //var_dump($_SESSION['private_gal']->getPicture($_GET['id']));
        //echo $_SESSION['private_gal']->getPicture($_GET['id'])->getKeywordsStr();
        
        $img="private_images/{$_SESSION['private_gal']->getPicture($_GET['id'])->getPath()}";
        //echo $img;
        
        
        echo "<img src=$img alt='' height='150px' >";
    
        echo "<form  action='update_pic_db.php' method='post'>
        <input type='hidden' value={$_SESSION['private_gal']->getPicture($_GET['id'])->getID()} name='pic_ID'/>
        <br/> Nom du fichier : <br/> <input type='text' name='pic_name' value={$_SESSION['private_gal']->getPicture($_GET['id'])->getPath()} readonly >
        <br/> Titre : <br/> <input type='text' name='pic_title' value= {$_SESSION['private_gal']->getPicture($_GET['id'])->getName()}>
        <br/> Description : <br/> <input type='text' name='pic_desc' value = {$_SESSION['private_gal']->getPicture($_GET['id'])->getDesc()}>
        <br/> Date (DD/MM/YYYY) : <br/> <input type='text' name='pic_date' value = {$_SESSION['private_gal']->getPicture($_GET['id'])->getDate()}> <br/>
        <br/> Kewords (comma separated) : <br/> <input type='text' name='pic_keywords' value = {$_SESSION['private_gal']->getPicture($_GET['id'])->getKeywordsStr()} > <br/>

        <input type='submit' value='Envoyer' >

        </form>";
        
    }

    // If the User clicked on "Delete"
    if ($_GET['action'] == 'delete') {
        //echo 'delete';
        $supprime = $db->query("Delete from phpproj_picturekeyword where pic_id={$_GET['id']}");
        $supprime = $db->delete("phpproj_picture", $_GET['id']);
        $_SESSION['private_gal']->delPicture($_GET['id']);
        
        //echo'done';
    }
}