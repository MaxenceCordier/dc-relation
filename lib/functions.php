<?php
if (!isset($_SESSION)) {
    session_start();
}

/**
 * Debugger une variable
 * @param mixed $var La variable à afficher
 * @param bool $die Arrêter l'execution
 */
function debug($var, bool $die = true) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
    if ($die) {
        die;
    }
}

function currentUser() {
    if (isset($_SESSION["id"])) {
        return getOneUser($_SESSION["id"]);
    }
    return null;
}

function currentUserHasRole(string $role) {
    $user = currentUser();

    if ($user['valide'] != 1) {
      header("Location: ../index.php");
    }
    
    if(is_null($user[$role])) {
      if (!is_null($user["admin"])) {
        header("Location: ../admin/index.php");
      }
      else if (!is_null($user["etudiant"])) {
        header("Location: ../etudiant/index.php");
      }
      else if (!is_null($user["entreprise"])) {
        header("Location: ../entreprise/index.php");
      }
      die;
    }
}

/**
 * Récupérer le chemin actuel (sans le nom du fichier)
 * @return string Path
 */
function currentPath() {
    return "http://" . $_SERVER["HTTP_HOST"] . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1);
}

function getHeader(string $title) {
    require_once __DIR__ . '/../layout/header.php';
}

function getFooter() {
    require_once __DIR__ . '/../layout/footer.php';
}

function getMenu() {
    require_once __DIR__ . '/../layout/menu.php';
}
