<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../app/config/database.php';
require '../../app/controllers/ProjectController.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

if (isset($_GET['id'])) {
    try {
        $controller = new ProjectController($db);
        $result = $controller->destroy($_GET['id']);

        if ($result) {
            echo json_encode([
                'Status' => true,
                'Message' => 'Project deleted successfully'
            ]);
        } else {
            echo json_encode([
                'Status' => false,
                'Message' => 'Delete failed'
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
