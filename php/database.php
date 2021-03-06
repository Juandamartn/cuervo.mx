<?php
function connection($db_config) {
    try {
        $con = new PDO('mysql:host='.$db_config['host'].';dbname='.$db_config['database'].'', $db_config['user'], $db_config['pass']);
        return $con;
    } catch (PDOException $e) {
        //echo "Error: ". $e->getMessage();
        return false;
    }
}

function insertMail($con, $mail) {
    $result = $con->query("INSERT INTO clients (mail_client) VALUES ('$mail')");
    return $result;
}

function insertFk($con, $id) {
    $result = $con->query("INSERT INTO quiz (fk_id_client) VALUES ('$id')");
    return true;
}

function searchId($con, $mail) {
    $result = $con->query("SELECT id_client FROM clients WHERE mail_client = '$mail'");
    $result->execute();
    return $result->fetchAll();
}

function searchClientInfo($con, $mail) {
    $result = $con->query("SELECT * FROM clients WHERE mail_client = '$mail'");
    $result->execute();
    return $result->fetchAll();
}

function searchAllData($con, $id) {
    $result = $con->query("SELECT clients.*, quiz.* FROM clients INNER JOIN quiz ON clients.id_client = quiz.fk_id_client WHERE clients.id_client = '$id'");
    $result->execute();
    return $result->fetchAll();
}

function searchFiles($con, $id) {
    $result = $con->query("SELECT photo, routine, diet FROM attached WHERE fk_id_client = '$id'");
    $result->execute();
    return $result->fetchAll();
}

function searchClientAll($con) {
    $result = $con->query("SELECT clients.id_client, clients.name_client, clients.age_client, clients.gender_client, clients.phone_client, clients.mail_client, quiz.date_quiz FROM clients INNER JOIN quiz ON clients.id_client = quiz.fk_id_client");
    $result->execute();
    return $result->fetchAll();
}

function sortClient($con, $orderP, $orderM) {
    $result = $con->query("SELECT clients.id_client, clients.name_client, clients.age_client, clients.gender_client, clients.phone_client, quiz.date_quiz FROM clients INNER JOIN quiz ON clients.id_client = quiz.fk_id_client ORDER BY " . $orderP . " " . $orderM);
    $result->execute();
    return $result->fetchAll();
}

function searchClientCustom($con, $w) {
    $w = strtolower($w);
    $wU = strtoupper($w);
    $result = $con->query("SELECT clients.id_client, clients.name_client, clients.age_client, clients.gender_client, clients.phone_client, quiz.date_quiz FROM clients INNER JOIN quiz ON clients.id_client = quiz.fk_id_client WHERE clients.name_client LIKE '%$w%' OR clients.name_client LIKE '%$wU%'");
    $result->execute();
    return $result->fetchAll();
}

function searchClientQuiz($con, $mail) {
    $result = $con->query("SELECT quiz.*, clients.mail_client FROM quiz INNER JOIN clients ON quiz.fk_id_client = clients.id_client WHERE clients.mail_client = '$mail'");
    $result->execute();
    return $result->fetchAll();
}

function mailExists($con, $mail) {
    $result = $con->query("SELECT id_client, mail_client FROM clients WHERE mail_client = '$mail'");
    $result->execute();
    return $result->fetchAll();
}

function insertClientData($con, $name, $age, $weight, $height, $gender, $birth, $civil, $ocupation, $phone, $id) {
    $result = $con->query("UPDATE clients SET name_client = '$name', age_client = '$age', weight_client = '$weight', height_client = '$height', gender_client = '$gender', birth_client = '$birth', civil_client = '$civil', ocupation_client = '$ocupation', phone_client = '$phone' WHERE id_client = '$id'");
    return true;
}

function insertForm1($con, $q_01, $id) {
    $result = $con->query("UPDATE quiz SET q_01 = '$q_01' WHERE fk_id_client = '$id'");
    return true;
}

function insertForm2($con, $q_02, $q_02_01, $q_03, $q_03_01, $q_04, $q_04_01, $q_04_02, $q_05, $q_05_01, $id) {
    $result = $con->query("UPDATE quiz SET q_02 = '$q_02', q_02_01 = '$q_02_01', q_03 = '$q_03', q_03_01 = '$q_03_01', q_04 = '$q_04', q_04_01 = '$q_04_01', q_04_02 = '$q_04_02', q_05 = '$q_05', q_05_01 = '$q_05_01' WHERE fk_id_client = '$id'");
    return true;
}

function insertForm3($con, $q_06, $q_06_01, $id) {
    $result = $con->query("UPDATE quiz SET q_06 = '$q_06', q_06_01 = '$q_06_01' WHERE fk_id_client = '$id'");
    return true;
}

function insertForm4($con, $q_07, $q_08, $q_09, $q_010, $q_011, $q_011_01, $q_012, $q_012_01, $q_012_02, $q_012_03, $q_013, $q_013_01, $q_013_02, $q_014, $q_014_01, $id) {
    $result = $con->query("UPDATE quiz SET q_07 = '$q_07', q_08 = '$q_08', q_09 = '$q_09', q_010 = '$q_010', q_011 = '$q_011', q_011_01 = '$q_011_01', q_012 = '$q_012', q_012_01 = '$q_012_01', q_012_02 = '$q_012_02', q_012_03 = '$q_012_03', q_013 = '$q_013', q_013_01 = '$q_013_01', q_013_02 = '$q_013_02', q_014 = '$q_014', q_014_01 = '$q_014_01' WHERE fk_id_client = '$id'");
    return true;
}

function loadImageProfile($con, $image, $admin) {
    $result = $con->query("UPDATE users SET photo = '$image' WHERE name_user = '$admin'");
    return true;
}

function loadRoutine($con, $file, $id) {
    $result = $con->query("UPDATE attached SET routine = '$file' WHERE fk_id_client = '$id'");
    return true;
}

function loadDiet($con, $file, $id) {
    $result = $con->query("UPDATE attached SET diet = '$file' WHERE fk_id_client = '$id'");
    return true;
}
