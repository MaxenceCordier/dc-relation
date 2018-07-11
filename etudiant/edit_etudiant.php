<?php
session_start();

require_once '../lib/functions.php';
require_once '../model/database.php';

//Récupérer les données du formulaire
$email = $_POST["email"];
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$id = $_SESSION["id"];
$contrat = $_POST["contrat"];
$specialites = $_POST["specialites"];
$departements = $_POST["departements"];

editEtudiant($email, $prenom, $nom, $contrat, $specialites, $departements, $id);

header("Location: profile.php");
