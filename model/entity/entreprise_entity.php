<?php


function getEntreprise(int $id) {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
utilisateur.*,
entreprise.*
FROM
utilisateur
INNER JOIN entreprise ON entreprise.id = utilisateur.id
WHERE utilisateur.id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}


function editEntreprise(string $email, string $avatar, string $nom, int $id) {
    /* @var $connection PDO */
    global $connection;

    editUtilisateur($email, $avatar, $id);

    $query = "UPDATE entreprise
              SET
              nom = :nom
              WHERE id = :id
              ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}
