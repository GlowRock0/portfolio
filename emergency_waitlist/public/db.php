<?php

session_start();

$host = 'localhost'; // or your server address
$db = $_SESSION['dbname'] ?? 'emergency_waitlist';
$user = $_SESSION['dbuser'] ?? 'postgres';
$pass = $_SESSION['dbpass'] ?? 'pass1234';
$dsn = "pgsql:host=$host;port=5432;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>