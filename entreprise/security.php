<?php

session_start();

require_once "../model/database.php";


if( isset(($_SESSION['id'])) ){
  // Recherche l'utilisateur en BDD
  $utilisateur = getOneUser($_SESSION['id']);

  if (isset($utilisateur["id"])) {
      $_SESSION["id"] = $utilisateur["id"];

      if (!is_null($utilisateur["admin"])) {
        header("Location: ../admin/index.php");
      }
      else if (!is_null($utilisateur["etudiant"]) && ($utilisateur['valide'] == 1)) {
        header("Location: ../etudiant/index.php");
      }
      else if (!is_null($utilisateur["entreprise"]) && ($utilisateur['valide'] == 1)) {
        header("Location: profile.php");
      }

  }

}

else {
  header("Location: ../index.php");
}
