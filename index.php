<?php
require_once 'lib/functions.php';
require_once 'model/database.php';

/*
// Déclaration des variables
$list_projects = getAllProjects(3);
*/

getHeader("Accueil");
?>

<body class="text-center">

<form action="index.php" method="post" class="form-signin">
    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
    <label for="inputEmail" class="sr-only">Email</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
    <label for="inputPassword" class="sr-only">Mot de passe</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Se souvenir de moi
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
</form>

</body>

<?php getFooter(); ?>