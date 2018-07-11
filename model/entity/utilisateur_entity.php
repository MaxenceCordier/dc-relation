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

    $query = "SELECT
utilisateur.email,
etudiant.nom,
etudiant.prenom,
etudiant.id,
etudiant.date_naissance,
etudiant.cv,
etudiant.lettre_motivation,
etudiant.date_debut_contrat,
etudiant.date_fin_contrat

FROM
utilisateur
INNER JOIN etudiant ON etudiant.id = utilisateur.id
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
etudiant.contrat_id,
specialite.label AS specialite,
departement.label AS departement
FROM
utilisateur
INNER JOIN etudiant ON etudiant.id = utilisateur.id
INNER JOIN etudiant_has_specialite ON etudiant.id = etudiant_has_specialite.etudiant_id
INNER JOIN specialite ON specialite.id = etudiant_has_specialite.specialite_id
INNER JOIN etudiant_has_departement ON etudiant.id = etudiant_has_departement.etudiant_id
INNER JOIN departement ON departement.id = etudiant_has_departement.departement_id
WHERE utilisateur.id = :id   ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

function editUtilisateur(string $email, string $avatar, int $id) {
    /* @var $connection PDO */
    global $connection;

    $query = "UPDATE utilisateur SET email = :email, avatar = :avatar WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":avatar", $avatar);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function insertSpecialite(string $label) {
    /* @var $connection PDO */
    global $connection;

    $query = "INSERT INTO specialite (label) VALUES (:label);";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":label", $label);
    $stmt->execute();

    return $connection->lastInsertId();
}

function insertEtudiantSpe(int $etudiant_id, int $specialite_id) {
    /* @var $connection PDO */
    global $connection;

    $query = "INSERT INTO etudiant_has_specialite (etudiant_id, specialite_id) VALUES (:etudiant_id, :specialite_id);";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":etudiant_id", $etudiant_id);
    $stmt->bindParam(":specialite_id", $specialite_id);
    $stmt->execute();

    return $connection->lastInsertId();
}

function insertEtudiantDep(int $etudiant_id, int $departement_id) {
    /* @var $connection PDO */
    global $connection;

    $query = "INSERT INTO etudiant_has_departement (etudiant_id, departement_id) VALUES (:etudiant_id, :departement_id);";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":etudiant_id", $etudiant_id);
    $stmt->bindParam(":departement_id", $departement_id);
    $stmt->execute();

    return $connection->lastInsertId();
}

function editEtudiant(string $email, string $avatar, string $prenom, string $nom, int $contrat, string $date_debut, string $date_fin, string $date_naissance, string $telephone, string $cv, string $lettre_motivation, array $specialites, array $departements, int $id) {
    /* @var $connection PDO */
    global $connection;

    editUtilisateur($email, $avatar, $id);

    $query = "UPDATE etudiant
              SET
              prenom = :prenom,
              nom = :nom,
              contrat_id = :contrat,
              date_debut_contrat = :date_debut,
              date_fin_contrat = :date_fin,
              date_naissance = :date_naissance,
              telephone = :telephone,
              cv = :cv,
              lettre_motivation = :lettre_motivation

              WHERE id = :id
              ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":prenom", $prenom);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":contrat", $contrat);
    $stmt->bindParam(":date_debut", $date_debut);
    $stmt->bindParam(":date_fin", $date_fin);
    $stmt->bindParam(":date_naissance", $date_naissance);
    $stmt->bindParam(":telephone", $telephone);
    $stmt->bindParam(":cv", $cv);
    $stmt->bindParam(":lettre_motivation", $lettre_motivation);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $query = "DELETE FROM etudiant_has_specialite WHERE etudiant_id = :id";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    foreach ($specialites as $specialite) {
      if (!is_numeric($specialite)) {
        $specialite = insertSpecialite($specialite);
      }
      insertEtudiantSpe($id, $specialite);
    }

    $query = "DELETE FROM etudiant_has_departement WHERE etudiant_id = :id";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();


    foreach ($departements as $departement) {
      insertEtudiantDep($id, $departement);
    }

}

function getAllSpecialitesByEtudiant(int $id) {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
    etudiant.id,
    specialite.label as spelabel,
    specialite.id as speid
FROM
etudiant

INNER JOIN etudiant_has_specialite ON etudiant.id = etudiant_has_specialite.etudiant_id
INNER JOIN specialite ON specialite.id = etudiant_has_specialite.specialite_id

WHERE etudiant.id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getAllDepartementsByEtudiant(int $id) {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
    etudiant.id,
    departement.label as deplabel,
    departement.id as depid
FROM
etudiant

INNER JOIN etudiant_has_departement ON etudiant.id = etudiant_has_departement.etudiant_id
INNER JOIN departement ON departement.id = etudiant_has_departement.departement_id

WHERE etudiant.id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetchAll();
}


function getContratyByEtudiant(int $id) {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
    etudiant.contrat_id,
    contrat.id,
    etudiant.id,
    contrat.label as contratlabel
    FROM
    etudiant
    INNER JOIN contrat ON etudiant.contrat_id = contrat.id
    WHERE etudiant.id = :id ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}
