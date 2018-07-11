<?php
require_once '../lib/functions.php';
require_once '../model/database.php';


getHeader("Accueil");
?>

<?php $entreprise = getEntreprise($_SESSION["id"]);

 ?>

<div>
<a href="liste_etudiants.php">Liste etudiants</a>
<a href="profile.php">Profil</a>
</div>

 <?php echo $entreprise['email']; ?>

 <div>

<?php $etudiants = getAllEtudiants(); ?>


<?php foreach ($etudiants as $etudiant) : ?>
  <?php echo $etudiant['nom'] . ' ' . $etudiant['prenom']; ?>

  <div><p>Spécialités :</p>

<?php

  $spes = getAllSpecialitesByEtudiant($etudiant['id']);


  foreach ($spes as $spe) :

   ?> <p><?php echo $spe['spelabel']; ?></p>

    <?php


  endforeach;

?>

</div>

<div><p>Départements :</p>

<?php

$deps = getAllDepartementsByEtudiant($etudiant['id']);


foreach ($deps as $dep) :

 ?> <p><?php echo $dep['deplabel']; ?></p>

  <?php


endforeach;

?>

</div>

<div>

<?php $contrat = getContratyByEtudiant($etudiant['id']); ?>


<?php /*$date_debut = date('Y-m-d', strtotime($etudiant['date_debut_contrat']));
      $date_fin = date('Y-m-d', strtotime($etudiant['date_fin_contrat']));
      $diff = $date_fin->diff($date_debut);
      echo $diff->d;

      echo $date_debut;*/

      $date_debut = $etudiant['date_debut_contrat'];
      print_r($date_debut);

      $date_fin = $etudiant['date_fin_contrat'];
      print_r($date_debut);

      $date_debut = strtotime($date_debut);
      print_r($date_debut);

      $date_fin = strtotime($date_fin);
      print_r($date_fin);

      $date_debut = date('Y-m-d', $date_debut);
      print_r($date_debut);
      $date_fin = date('Y-m-d', $date_fin);
      print_r($date_fin);

      $diff = $date_fin->diff($date_debut);
      echo $diff->d;

            ?>


<p> Recherche <?php echo $contrat['contratlabel']; ?> </p>


</div>


  <?php endforeach; ?>


</div>


<?php getFooter(); ?>
