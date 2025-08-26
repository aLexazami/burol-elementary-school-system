<?php
require_once '../db-connection.php';
require_once '../includes/functions.php';

header('Content-Type: application/json');

$type = $_GET['type'] ?? null;

if ($type) {
    try {
        $services = getServicesByCustomerType($pdo, $type);
        echo json_encode($services);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Database error']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Missing customer type']);
}