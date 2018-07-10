<?php
require_once 'lib/functions.php';
require_once 'model/database.php';


getHeader("Accueil");
?>

salut
<?php  $listeEtudiants = getAllEtudiants(); ?>

<?php print_r($listeEtudiants); ?>

<?php getFooter(); ?>
