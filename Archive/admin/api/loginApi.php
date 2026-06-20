<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");
session_start();

require '../../app/config/database.php';

// Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Get JSON data
$data = json_decode(file_get_contents('php://input'), true);

$email = isset($data['email']) ? trim($data['email']) : '';
$password = isset($data['password']) ? trim($data['password']) : '';

// Validate input
if (!$email || !$password) {
    http_response_code(400);
    echo json_encode(['error' => 'Email and password are required']);
    exit;
}

try {
    // Fetch admin from DB
    $stmt = $db->prepare("SELECT * FROM admins WHERE email = ?");
    $stmt->execute([$email]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && password_verify($password, $admin['password'])) {
        // Successful login
        session_regenerate_id(true);
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_name'] = $admin['name'];

        echo json_encode([
            'success' => true,
            'message' => 'Login successful',
            'admin' => [
                'id' => $admin['id'],
                'name' => $admin['name'],
                'email' => $admin['email']
            ]
        ]);
    } else {
        // Wrong email or password
        http_response_code(401);
        echo json_encode(['error' => 'Invalid email or password']);
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Server error: '.$e->getMessage()]);
}
?>
