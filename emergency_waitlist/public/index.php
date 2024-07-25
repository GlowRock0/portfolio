<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Triage System</title>
</head>
<body>
    <h1>Hospital Triage System</h1>

    <?php
    require 'db.php';

    try {
        $stmt = $pdo->query('SELECT * FROM patients');
        echo "<h2>Patient List</h2>";
        echo "<ul>";
        while ($row = $stmt->fetch()) {
            echo "<li>Name: " . $row['name'] . " - Code: " . $row['code'] . " - Severity: " . $row['severity'] . " - Wait Time: " . $row['wait_time'] . " minutes</li>";
        }
        echo "</ul>";
    } catch (PDOException $e) {
        echo 'Query failed: ' . $e->getMessage();
    }
    ?>

</body>
</html>
