<?php
require_once '../lib/functions.php';
require_once '../model/database.php';


getHeader("Accueil");
?>

<?php $entreprise = getEntreprise($_SESSION["id"]);

 ?>


<a href="liste_etudiants.php">Liste etudiants</a>
<a href="profile.php">Profil</a>

 <?php echo $entreprise['email']; ?>

<?php $etudiants = getAllEtudiants(); ?>


<?php foreach ($etudiants as $etudiant) : ?>
  <?php echo $etudiant['nom'] . ' ' . $etudiant['prenom'];

?>

  <?php endforeach; ?>



<?php getFooter(); ?>
