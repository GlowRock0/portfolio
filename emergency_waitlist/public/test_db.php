<?php
require 'db.php';

$stmt = $pdo->query('SELECT * FROM patients');
while ($row = $stmt->fetch()) {
    echo $row['name'] . "<br>";
}
?>