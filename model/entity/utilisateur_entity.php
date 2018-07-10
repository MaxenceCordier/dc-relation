<?php

function getUserByEmailPassword(string $email, string $password) {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
            	  utilisateur.*,
                admin.id AS admin,
                etudiant.id AS etudiant,
                entreprise.id AS entreprise
            FROM utilisateur
            LEFT JOIN admin ON admin.id = utilisateur.id
            LEFT JOIN etudiant ON etudiant.id = utilisateur.id
            LEFT JOIN entreprise ON entreprise.id = utilisateur.id
            WHERE email = :email
            AND mot_de_passe = SHA1(:password);";

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

function insertUtilisateur(string $email, string $password, string $type) {
    /* @var $connection PDO */
    global $connection;

    try {
      $query = "INSERT INTO utilisateur (email, mot_de_passe, date_inscription)
                  VALUES (:email, SHA1(:password), NOW());";

      $stmt = $connection->prepare($query);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":password", $password);
      $stmt->execute();
    } catch (\PDOException $e) {
      return $e->getMessage();
    }

    $id = $connection->lastInsertId();

    if ($type == 'etudiant') {
      $query = "INSERT INTO etudiant (id) VALUES (:id);";
      $stmt = $connection->prepare($query);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
    }

    if ($type == 'entreprise') {
      $query = "INSERT INTO entreprise (id) VALUES (:id);";
      $stmt = $connection->prepare($query);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
    }
}

function getAllEtudiants() {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT utilisateur.email
              FROM
              utilisateur
              INNER JOIN etudiant
              ON etudiant.id = utilisateur.id

              ;";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}


function getEtudiant(int $id) {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
utilisateur.*,
etudiant.*,
etudiant.id AS etudiant,
contrat.label AS contrat,
specialite.label AS specialite,
departement.label AS departement
FROM
utilisateur
INNER JOIN etudiant ON etudiant.id = utilisateur.id
INNER JOIN contrat ON contrat.id = etudiant.id
INNER JOIN etudiant_has_specialite ON etudiant.id = etudiant_has_specialite.etudiant_id
INNER JOIN specialite ON specialite.id = etudiant_has_specialite.specialite_id
INNER JOIN etudiant_has_departement ON etudiant.id = etudiant_has_departement.etudiant_id
INNER JOIN departement ON departement.id = etudiant_has_departement.departement_id   ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

function editUtilisateur(string $email, int $id) {
    /* @var $connection PDO */
    global $connection;

    $query = "UPDATE utilisateur SET email = :email WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function editEtudiant(string $email, string $prenom, string $nom, int $id) {
    /* @var $connection PDO */
    global $connection;

    editUtilisateur($email, $id);

    $query = "UPDATE etudiant
              SET
              prenom = :prenom,
              nom = :nom
              WHERE id = :id
              ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":prenom", $prenom);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}
