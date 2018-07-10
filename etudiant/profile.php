<?php
require_once '../lib/functions.php';
require_once '../model/database.php';


getHeader("Accueil");
?>

<?php $utilisateur = getEtudiant($_SESSION["id"]);

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
     <label for="inputContrat">Contrat</label>
     <select name="contrat" id="contrat">
        <option value="<?php echo $utilisateur['contrat']; ?>"><?php echo $utilisateur['contrat']; ?></option>
        <option value="<?php if ($utilisateur['contrat'] == 'Alternance') {
              echo 'Stage';
              }
              else {
                echo 'Alternance';
              }

              ?>">

              <?php if ($utilisateur['contrat'] == 'Alternance') {
                    echo 'Stage';
                    }
                    else {
                      echo 'Alternance';
                    }

                    ?>

                  </option>

>

      </select>


     <button class="btn btn-lg btn-primary btn-block" type="submit">Mettre à jour mon profil</button>
 </form>



<?php getFooter(); ?>
