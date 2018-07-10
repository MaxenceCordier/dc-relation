<?php
require_once 'lib/functions.php';
require_once 'model/database.php';

/*
// Déclaration des variables
$list_projects = getAllProjects(3);
*/

getHeader("Accueil");
?>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <form>
                        <form class="row">
                            <div class="filtres mt-5 card-header">
                                <h2>Filtres</h2>
                                <label for="inputState">Région</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                                <label for="inputState">Ville</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                                <label for="inputState">Besoin d'un</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                                <label for="inputState">Ecole</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                                <label for="inputState">Diplôme</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                                <label for="inputState">Spécialité</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                                <label for="inputState">Période maximum</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>

                                <div class="filtres"><button type="submit" class="btn btn-primary mt-5">Filtrer</button></div>
                            </div>
                        </form>
                    </form>
                </div>

                <div class="col-md-8 sm-12 mt-5 justify-content-center">
                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" src="images/johndoe.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">John Doe</h5>
                                <h6>Chef de projet web</h6>
                                <h6>Région</h6>
                                <p class="card-text">Je recherche une alternance.</p>
                                <div class="btn-container"><button type="button" class="btn btn-outline-info dl">Télécharger le CV</button></div>
                                <div class="btn-container"><button type="button" class="btn btn-outline-info dl">Contacter par téléphone</button></div>
                                <div class="btn-container"><button type="button" class="btn btn-outline-info dl">Contacter par email</button></div>
                            </div>
                        </div>

                        <div class="card">
                            <img class="card-img-top" src="images/johndoe.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">John Doe</h5>
                                <h6>Chef de projet web</h6>
                                <h6>Région</h6>
                                <p class="card-text">Je recherche une alternance.</p>
                                <div class="btn-container"><button type="button" class="btn btn-outline-info dl">Télécharger le CV</button></div>
                                <div class="btn-container"><button type="button" class="btn btn-outline-info dl">Contacter par téléphone</button></div>
                                <div class="btn-container"><button type="button" class="btn btn-outline-info dl">Contacter par email</button></div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">

                </div>
            </div>
        </div>

    </body>

    <?php getFooter(); ?>