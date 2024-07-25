<?php
session_start();
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

$_SESSION['dbname'] = $input['dbname'] ?? '';
$_SESSION['dbuser'] = $input['dbuser'] ?? '';
$_SESSION['dbpass'] = $input['dbpass'] ?? '';

if (!empty($_SESSION['dbname']) && !empty($_SESSION['dbuser']) && !empty($_SESSION['dbpass'])) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>
