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
