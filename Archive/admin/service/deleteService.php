<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../app/config/database.php';
require '../../app/controllers/ServiceController.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

if (isset($_GET['id'])) {
    try {
        $controller = new ServiceController($db);
        $result = $controller->destroy($_GET['id']);

        if ($result) {
            echo json_encode([
                'Status' => true,
                'Message' => 'Service deleted successfully'
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
