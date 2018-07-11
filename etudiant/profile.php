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

 <form action="edit_etudiant.php" method="post" class="form-signin" enctype="multipart/form-data">
     <h1 class="h3 mb-3 font-weight-normal">Votre profil</h1>
     <img src="<?php echo SITE_URL; ?>images/<?php echo $utilisateur['avatar']; ?>" name="avatar">
     <div>
            <label for="avatar">Photo</label>
            <input type="file" name="avatar" id="image">
      </div>
     <label for="inputEmail">Email</label>
     <input type="email" name="email" id="inputEmail" class="form-control" value="<?php echo $utilisateur['email']; ?>" required autofocus>
     <label for="inputPrenom">Prénom</label>
     <input type="text" name="prenom" id="inputPrenom" class="form-control" value="<?php echo $utilisateur['prenom']; ?>" required autofocus>
     <label for="inputNom">Prénom</label>
     <input type="text" name="nom" id="inputNom" class="form-control" value="<?php echo $utilisateur['nom']; ?>" required autofocus>
     <label for="telephone">Téléphone</label>
     <input type="phone" name="telephone" id="telephone" class="form-control" value="<?php echo $utilisateur['telephone']; ?>" required autofocus>
     <div>
            <label for="cv">CV</label>
            <p><a href="<?php echo SITE_URL?>uploads/<?php echo $utilisateur['cv']; ?>" target="_blank">Voir le CV actuel mis en ligne</a></p>
            <input type="file" name="cv" id="cv">
      </div>
      <div>
             <label for="lettre">Lettre de motivation</label>
             <p><a href="<?php echo SITE_URL?>uploads/<?php echo $utilisateur['lettre_motivation']; ?>" target="_blank">Voir la lettre de motivation actuelle mise en ligne</a></p>
             <input type="file" name="lettre" id="lettre">
       </div>

     <div>
       <label for="naissance">Date de début de contrat</label>
       <input type="date" id="naissance" name="naissance"
              value="<?php echo $utilisateur['date_naissance'] ; ?>" />
     </div>
     <label for="contrat">Contrat</label>
     <select name="contrat" id="contrat">
      <?php foreach ($contrats as $contrat) : ?>

        <option value="<?php echo $contrat['id']; ?>" <?php echo ( $contrat['id'] == $utilisateur['contrat_id']) ? 'selected' : ''; ?>>
          <?php echo $contrat['label']; ?>
        </option>

      <?php endforeach; ?>

      </select>

      <div>
        <label for="start">Date de début de contrat</label>
        <input type="date" id="start" name="start"
               value="<?php echo $utilisateur['date_debut_contrat'] ; ?>" />
      </div>


            <div>
              <label for="end">Date de fin de contrat</label>
              <input type="date" id="end" name="end"
                     value="<?php echo $utilisateur['date_fin_contrat'] ; ?>" />
            </div>

      <label for="specialites[]">Specialités</label>

      <select class="form-control select2-tag" name="specialites[]" multiple="multiple">

        <?php foreach ($specialites as $specialite) : ?>

          <option value="<?php echo $specialite['id']; ?>" <?php echo (in_array($specialite['id'], $spe_ids)) ? 'selected' : ''; ?>>
            <?php echo $specialite['label']; ?>
          </option>

        <?php endforeach; ?>


      </select>


      <label for="departements[]">Départements</label>
      <select class="form-control select2-notag" name="departements[]" multiple="multiple">

        <?php foreach ($departements as $departement) : ?>

          <option value="<?php echo $departement['id']; ?>" <?php echo (in_array($departement['id'], $dep_ids)) ? 'selected' : ''; ?>>
            <?php echo $departement['label']; ?>
          </option>

        <?php endforeach; ?>


      </select>






     <button class="btn btn-lg btn-primary btn-block" type="submit">Mettre à jour mon profil</button>
 </form>



<?php getFooter(); ?>
