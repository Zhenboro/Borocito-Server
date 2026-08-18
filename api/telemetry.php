<?php
include_once('utilities.php');
header('Content-Type: application/json; charset=utf-8');

CheckInstance();

const TELEMETRY_DIR = "Telemetry/";
const TELEMETRY_PREFIX = "telemetry_";
const TELEMETRY_EXTENSION = ".log";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!file_exists("./Users/" . GetUUID() .  ".rtp")) {
        die(json_encode([
            'status' => "YEAH, *DROPS UR PACKAGE*"
        ]));
    };

    if (isset($_POST['content']) && $_POST['content']!="") {
        $archivo = TELEMETRY_DIR . TELEMETRY_PREFIX . GetUUID() . TELEMETRY_EXTENSION;
        $contenido = $_POST['content'];
        if (file_exists($archivo)) {
            $fp = fopen($archivo, "a");
            fwrite($fp, "\n" . $contenido);
            fclose($fp);
        } else {
            $fp = fopen($archivo, "w");
            fwrite($fp, $contenido);
            fclose($fp);
        }
        die(json_encode([
            'status' => 'ok'
        ]));
    };

    $uuid = uniqid();
    if (array_key_exists("file", $_FILES)) {
        $archivo = TELEMETRY_DIR . "Files/"  . GetUUID() . "-" . $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], $archivo);
        die(json_encode([
            'uuid' => basename($archivo)
        ]));
    };
};

die(json_encode([
    'status' => 'not supported.'
]));
