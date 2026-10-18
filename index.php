<?php
date_default_timezone_set("America/Santiago");

$router = $_GET['router'] ?? '';

switch ($router) {
    case 'api':
        require __DIR__ . '/api.php';
        break;
    case 'control':
        require __DIR__ . '/control.php';
        break;
    default:
        http_response_code(404);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'status' => 'Who tf are you?'
        ]);
}
