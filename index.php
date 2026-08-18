<?php
date_default_timezone_set("America/Santiago");

$route = trim($_GET['route'] ?? '', '/');

switch ($route) {
    case '':
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'status' => '?'
        ]);
        break;
    case 'report':
        require __DIR__ . '/api/report.php';
        break;
    case 'configuration':
        require __DIR__ . '/api/configuration.php';
        break;
    case 'instance':
        require __DIR__ . '/api/instance.php';
        break;
    case 'telemetry':
        require __DIR__ . '/api/telemetry.php';
        break;
    case 'boro-get/repository':
        require __DIR__ . '/api/boro-get.php';
        break;
    default:
        http_response_code(404);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'error' => 'Ruta no encontrada'
        ]);
}