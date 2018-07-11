<?php
require_once '../lib/functions.php';
require_once '../model/database.php';


getHeader("Accueil");
?>

<?php $utilisateur = getEtudiant($_SESSION["id"]);
    //  print_r($utilisateur);die;
      $utilisateur_spe = getAllSpecialitesByEtudiant($_SESSION["id"]);
      $utilisateur_dep = getAllDepartementsByEtudiant($_SESSION["id"]);
      $contrats = getAllEntity("contrat");
      $specialites = getAllEntity("specialite");
      $departements = getAllEntity("departement");

      $spe_ids = [];
      foreach ($utilisateur_spe as $spe) {
        $spe_ids[] = $spe["speid"];
      }

      $dep_ids = [];
      foreach ($utilisateur_dep as $dep) {
        $dep_ids[] = $dep["depid"];
      }

 ?>


 <?php echo $utilisateur['email']; ?>

 <form action="edit_etudiant.php" method="post" class="form-signin">
     <h1 class="h3 mb-3 font-weight-normal">Votre profil</h1>
     <label for="inputEmail">Email</label>
     <input type="email" name="email" id="inputEmail" class="form-control" value="<?php echo $utilisateur['email']; ?>" required autofocus>
     <label for="inputPrenom">Prénom</label>
     <input type="text" name="prenom" id="inputPrenom" class="form-control" value="<?php echo $utilisateur['prenom']; ?>" required autofocus>
     <label for="inputNom">Prénom</label>
     <input type="text" name="nom" id="inputNom" class="form-control" value="<?php echo $utilisateur['nom']; ?>" required autofocus>
     <label for="contrat">Contrat</label>
     <select name="contrat" id="contrat">
      <?php foreach ($contrats as $contrat) : ?>

        <option value="<?php echo $contrat['id']; ?>" <?php echo ( $contrat['id'] == $utilisateur['contrat_id']) ? 'selected' : ''; ?>>
          <?php echo $contrat['label']; ?>
        </option>

      <?php endforeach; ?>

      </select>

      <label for="specialites[]">Specialités</label>

      <select class="form-control select2-tag" name="specialites[]" multiple="multiple">

        <?php foreach ($specialites as $specialite) : ?>

          <option value="<?php echo $specialite['id']; ?>" <?php echo (in_array($specialite['id'], $spe_ids)) ? 'selected' : ''; ?>>
            <?php echo $specialite['label']; ?>
          </option>

        <?php endforeach; ?>


      </select>


      <label for="departements[]">Départements</label>
      <select class="form-control select2" name="departements[]" multiple="multiple">

        <?php foreach ($departements as $departement) : ?>

          <option value="<?php echo $departement['id']; ?>" <?php echo (in_array($departement['id'], $dep_ids)) ? 'selected' : ''; ?>>
            <?php echo $departement['label']; ?>
          </option>

        <?php endforeach; ?>


      </select>






     <button class="btn btn-lg btn-primary btn-block" type="submit">Mettre à jour mon profil</button>
 </form>



<?php getFooter(); ?>
