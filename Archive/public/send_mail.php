<?php
header('Content-Type: application/json');

require_once '../app/controllers/ContactController.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status'=>'error','message'=>'Invalid request']);
    exit;
}

$success = ContactController::handle($_POST);

echo json_encode([
    'status' => $success ? 'success' : 'error',
    'message' => $success ? 'Message sent successfully' : 'Mail failed'
]);
