<?php
session_start();

require_once '../lib/functions.php';
require_once '../model/database.php';

//Récupérer les données du formulaire
$avatar = $_FILES['avatar']['name'];
$image_tmp = $_FILES['avatar']['tmp_name'];

// Exemple avec une image fraichement uploadée
if( isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0)
{
    $image_path = '../images/' .$avatar;
    $thumb_path = '../images/thumbnails/'. $avatar;

    move_uploaded_file($image_tmp, $image_path);
    imagethumb($image_path, $thumb_path, 120);
}

$email = $_POST["email"];
$nom = $_POST["nom"];
$id = $_SESSION["id"];

editEntreprise($email, $avatar, $nom, $id);

header("Location: profile.php");
