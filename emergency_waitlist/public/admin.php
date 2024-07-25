<?php
header('Content-Type: application/json');

// Database connection
require 'db.php';

try {
    $stmt = $pdo->query('SELECT name, code, wait_time FROM patients');
    $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($patients);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
