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
$date_debut = date("Y-m-d", strtotime($_POST['start']));
$date_fin = date("Y-m-d", strtotime($_POST['end']));
$date_naissance = date("Y-m-d", strtotime($_POST['naissance']));
$telephone = $_POST["telephone"];

$avatar = $_FILES['avatar']['name'];
$image_tmp = $_FILES['avatar']['tmp_name'];

$utilisateur = getEtudiant($_SESSION["id"]);

// Exemple avec une image fraichement uploadée
if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0)
{
    $image_path = '../images/' .$avatar;
    $thumb_path = '../images/thumbnails/'. $avatar;

    move_uploaded_file($image_tmp, $image_path);
    imagethumb($image_path, $thumb_path, 120);
}

else {
  $avatar = $utilisateur['avatar'];
}

editEtudiant($email, $avatar, $prenom, $nom, $contrat, $date_debut, $date_fin, $date_naissance, $telephone, $specialites, $departements, $id);

header("Location: profile.php");
