<?php

require_once 'model/database.php';

// Récupérer les données du formulaire
$email = $_POST["email"];
$password = $_POST["password"];
$type = $_POST["type"];


// Insertion des données en BDD
$error = insertUtilisateur($email, $password, $type);

if (!is_null($error)) {
  header("Location: index.php?error=" . $error);
} else {
  header("Location: index.php");
}
