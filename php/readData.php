<?php
require '../private/config.php';
require 'database.php';

error_reporting(0);

header('Content-type: application/json; charset=utf-8');

$con = connection($db_config);

if ($con) {
    $clients = searchClientAll($con);
    $response = [];

    for ($i = 0; $i < count($clients); $i++) {
        if (isset($_GET['complete'])) {
            if ($clients[$i]['name_client'] != "") {
                $clients2 = [
                    'id' => $clients[$i]['id_client'],
                    'name' => $clients[$i]['name_client'],
                    'age' => $clients[$i]['age_client'],
                    'gender' => $clients[$i]['gender_client'],
                    'phone' => $clients[$i]['phone_client'],
                    'date' => str_replace('-', '/', substr($clients[$i]['date_quiz'], 0, 10))
                ];
                array_push($response, $clients2);
            }
        } else if (isset($_GET['incomplete'])) {
            if ($clients[$i]['name_client'] == "") {
                $clients2 = [
                    'id' => $clients[$i]['id_client'],
                    'name' => $clients[$i]['mail_client'],
                    'age' => '-',
                    'gender' => '-',
                    'phone' => '-',
                    'date' => str_replace('-', '/', substr($clients[$i]['date_quiz'], 0, 10))
                ];
                array_push($response, $clients2);
            }
        }
    }
} else {
    $response = [
        'error' => true
    ];
}

echo json_encode($response);
