<?php

function getUserByEmailPassword(string $email, string $password) {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT *
            FROM utilisateur
            WHERE email = :email
            AND password = SHA1(:mot_de_passe);";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->execute();

    return $stmt->fetch();
}

function getOneUser(int $id) {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT *
            FROM utilisateur
            WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

function insertUtilisateur(string $email, string $password) {
    /* @var $connection PDO */
    global $connection;

    $query = "INSERT INTO utilisateur (email, mot_de_passe, date_inscription)
                VALUES (:email, :password, :date_inscription);";

      /*$query = "INSERT INTO utilisateur(email, mot_de_passe, date_insciption)
              SELECT * FROM (SELECT ':email', :mot_de_passe, :date_insciption) AS tmp
              WHERE NOT EXISTS (
                SELECT email FROM utilisateur WHERE email = :email
              ) LIMIT 1;

            ";*/

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $newDate = new DateTime();
    $newDate = $newDate->format('Y-m-d H:i:s');
    $stmt->bindParam(":date_inscription", $newDate);
    $stmt->execute();
}

function getAllUtilisateurs() {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
              *
              FROM
              utilisateur;";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}
