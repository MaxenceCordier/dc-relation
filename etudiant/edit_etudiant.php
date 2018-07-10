<?php
require_once '../lib/functions.php';
require_once '../model/database.php';


getHeader("Accueil");


//Récupérer les données du formulaire
$email = $_POST["email"];
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$id = $_SESSION["id"];
//$contrat = $_POST["contrat"];

editEtudiant($email, $prenom, $nom, $id);

header("Location: profile.php");

?>
<?php getFooter(); ?>
