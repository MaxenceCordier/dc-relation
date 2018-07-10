<?php

session_start();

require_once __DIR__ . "/model/database.php";

// L'utilisateur essai de se connecter
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Recherche l'utilisateur en BDD
    $utilisateur = getUserByEmailPassword($email, $password);

    if (isset($utilisateur["id"])) {
        $_SESSION["id"] = $utilisateur["id"];

        if (!is_null($utilisateur["admin"])) {
          header("Location: admin/index.php");
        }
        else if (!is_null($utilisateur["etudiant"])) {
          header("Location: etudiant/profile.php");
        }
        else if (!is_null($utilisateur["entreprise"])) {
          header("Location: entreprise/profile.php");
        }}
}
