<?php

require_once 'model/database.php';

// Récupérer les données du formulaire
$email = $_POST["email"];
$password = $_POST["password"];
$type = $_POST["type"];


// Insertion des données en BDD
insertUtilisateur($email, $password, $type);

// Redirection vers la liste
header("Location: index.php");
