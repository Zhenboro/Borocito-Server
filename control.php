<?php

$route = trim($_GET['route'] ?? '', '/');

switch ($route) {
    case '':
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'status' => 'control online'
        ]);
        break;
    case 'list/instances':
        //require __DIR__ . '/control/start.php';
        break;
    case 'list/telemetry-logs':
        //require __DIR__ . '/control/start.php';
        break;
    case 'list/telemetry-files':
        //require __DIR__ . '/control/start.php';
        break;
    case 'get/telemetry-log':
        //require __DIR__ . '/control/start.php';
        break;
    case 'get/telemetry-file':
        //require __DIR__ . '/control/start.php';
        break;
    case 'get/report':
        //require __DIR__ . '/control/start.php';
        break;
    default:
        http_response_code(404);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'error' => 'Ruta CONTROL no encontrada'
        ]);
}
