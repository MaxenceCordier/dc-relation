<?php
require_once '../lib/functions.php';
require_once '../model/database.php';


getHeader("Accueil");
?>

<?php $entreprise = getEntreprise($_SESSION["id"]);

 ?>


 <?php echo $entreprise['email']; ?>

 <form action="edit_entreprise.php" method="post" class="form-signin" enctype="multipart/form-data">
     <h1 class="h3 mb-3 font-weight-normal">Votre profil</h1>
     <img src="<?php echo SITE_URL; ?>images/<?php echo $entreprise['avatar']; ?>">
     <div>
            <label for="image">Photo</label>
            <input type="file" name="image" id="image">
            <label for="legende">Légende</label>
            <input type="text" name="legende" id="legende" value="legende">
             </div>
     <label for="inputEmail">Email</label>
     <input type="email" name="email" id="inputEmail" class="form-control" value="<?php echo $entreprise['email']; ?>" required autofocus>
     <label for="inputNom">Nom</label>
     <input type="text" name="nom" id="inputNom" class="form-control" value="<?php echo $entreprise['nom']; ?>" required autofocus>
     <label for="inputNom">Nom</label>
     <input type="text" name="nom" id="inputNom" class="form-control" value="<?php echo $entreprise['nom']; ?>" required autofocus>


     <button class="btn btn-lg btn-primary btn-block" type="submit">Mettre à jour mon profil</button>
 </form>



<?php getFooter(); ?>
