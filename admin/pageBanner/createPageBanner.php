<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../app/config/database.php';
require '../../app/controllers/PageBannerController.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $controller = new PageBannerController($db);
        $result = $controller->store($_POST, $_FILES);

        if ($result) {
            echo json_encode([
                'Status' => true,
                'Message' => 'Page Banner added successfully'
            ]);
        } else {
            echo json_encode([
                'Status' => false,
                'Message' => 'Failed to add page banner'
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
