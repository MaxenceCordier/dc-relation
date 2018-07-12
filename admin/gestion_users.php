<?php

require_once '../lib/functions.php';
require_once '../model/database.php';
//require_once 'security.php';

 getHeader("Accueil"); ?>

<h1>Admin</h1>


<?php $liste_utilisateurs = getUtilisateursNotValide(); ?>

<?php print_r($liste_utilisateurs); ?>

<?php foreach ($liste_utilisateurs as $user) : ?>


  <form action="edit_validation.php" method="post" class="form-signin" enctype="multipart/form-data">
    <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ; ?>"><br>
      <p><?php echo $user['user_email']; ?><?php echo $user['user_id'] ; ?></p>
      <button name="test" type="submit" value="1">Valider le compte</button>
  </form>

<?php


?>

<?php endforeach;
 ?>

<?php getFooter(); ?>
