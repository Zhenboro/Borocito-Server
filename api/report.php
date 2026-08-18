<?php
include_once('key-pairs.php');
include_once('utilities.php');
header('Content-Type: application/json; charset=utf-8');

CheckNewInstance();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cuerpo = json_decode(file_get_contents('php://input'), true);
    $cuerpo['public_ip'] = $_SERVER['REMOTE_ADDR'];

    $uuid = uniqid();
    file_put_contents("./Users/" . $uuid . ".rtp", json_encode($cuerpo, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    file_put_contents("./Users/Commands/" . $uuid . ".str", "#|Borocito-CS-PHP|{$uuid}\nCommand1>\nCommand2>\nCommand3>\n[Response]");

    die(json_encode([
        'uuid' => $uuid
    ]));
};

die(json_encode([
    'status' => 'not supported.'
]));