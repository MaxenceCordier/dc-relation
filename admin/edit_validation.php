<?php
session_start();

require_once '../lib/functions.php';
require_once '../model/database.php';
//require_once 'security.php';

$validation = $_POST["test"];
$id = $_POST["user_id"];

print_r($id);


validationUtilisateur($id, $validation);

header("Location: index.php");
