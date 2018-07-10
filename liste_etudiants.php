<?php
require_once 'lib/functions.php';
require_once 'model/database.php';


getHeader("Accueil");
?>

salut
<<<<<<< HEAD
<?php  $listeEtudiants = getAllEtudiants(); ?>
=======
<?php  $listeEtudiants = getAllUtilisateurs(); ?>
>>>>>>> master

<?php print_r($listeEtudiants); ?>

<?php getFooter(); ?>
