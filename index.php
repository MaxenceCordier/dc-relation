<?php
require_once 'lib/functions.php';
require_once 'model/database.php';
/*
<<<<<<< HEAD
*/
// Déclaration des variables
$list_projects = getAllProjects(3);
/*
=======
>>>>>>> 0e1811ea631b4ce020ce57e05cafc7efc8966a70
*/
getHeader("Accueil");
?>

<!--<<<<<<< HEAD -->
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
        <form action="" method="post" class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
            <label for="inputPassword" class="sr-only">Mot de passe</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>

        <form action="create_user.php" method="post" class="">
            <h1 class="h3 mb-3 font-weight-normal">Inscription</h1>
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
            <select name="type" id="type">
  <option value="volvo">Etudiant</option>
  <option value="saab">Entreprise</option>
</select>
<label for="inputPassword" class="sr-only">Mot de passe</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>


<?php getFooter(); ?>
