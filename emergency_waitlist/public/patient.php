<?php
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

$name = $input['name'] ?? '';
$code = $input['code'] ?? '';

// Database connection
require 'db.php';

try {
    $stmt = $pdo->prepare('SELECT wait_time FROM patients WHERE code = :code AND name = :name');
    $stmt->execute(['code' => $code, 'name' => $name]);
    $patient = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($patient) {
        echo json_encode(['wait_time' => $patient['wait_time']]);
    } else {
        echo json_encode(['wait_time' => 'Not found']);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>