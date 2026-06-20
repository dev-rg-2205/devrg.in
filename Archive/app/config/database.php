<?php
// database.php
$host = 'localhost';
$dbName = 'devrg';
$user = 'root';
$pass = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If DB fails, send JSON error
    header("Content-Type: application/json");
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed: '.$e->getMessage()]);
    exit;
}
?>
