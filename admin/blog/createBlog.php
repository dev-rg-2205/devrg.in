<?php
require '../../app/config/database.php';
require '../../app/controllers/BlogController.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $controller = new BlogController($db);
        $result = $controller->store($_POST, $_FILES);

        if ($result) {
            echo json_encode([
                'Status' => true,
                'Message' => 'Blog added successfully'
            ]);
        } else {
            echo json_encode([
                'Status' => false,
                'Message' => 'Failed to add blog'
            ]);
        }
    } catch (Exception $e) {
        echo json_encode([
            'Status' => false,
            'Message' => $e->getMessage()
        ]);
    }
    exit;
}
