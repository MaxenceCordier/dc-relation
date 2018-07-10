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
                <div class="col-md-12 sm-12 mt-5 justify-content-center">
                    <div class="card-deck">
                    <div class="card col-md-4">
                            <img class="card-img-top" src="images/maserati.png" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Alternance Maserati</h5>
                                <h6>Recherche un chef de projet web</h6>
                                <h6>Région</h6>
                                <div class="btn-container"><button type="button" class="btn btn-outline-danger dl">Voir l'annonce</button></div>
                            </div>
                        </div>

                        <div class="card col-md-4">
                            <img class="card-img-top" src="images/maserati.png" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Alternance Maserati</h5>
                                <h6>Recherche un chef de projet web</h6>
                                <h6>Région</h6>
                                <div class="btn-container"><button type="button" class="btn btn-outline-danger dl">Voir l'annonce</button></div>
                            </div>
                        </div>

                        <div class="card col-md-4">
                            <img class="card-img-top" src="images/maserati.png" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Alternance Maserati</h5>
                                <h6>Recherche un chef de projet web</h6>
                                <h6>Région</h6>
                                <div class="btn-container"><button type="button" class="btn btn-outline-danger dl">Voir l'annonce</button></div>
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