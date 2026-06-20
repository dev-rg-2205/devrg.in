<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../app/config/database.php';
require '../../app/controllers/ExperienceController.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $controller = new ExperienceController($db);
        $result = $controller->store($_POST);

        if ($result) {
            echo json_encode([
                'Status' => true,
                'Message' => 'Experience added successfully'
            ]);
        } else {
            echo json_encode([
                'Status' => false,
                'Message' => 'Failed to add experience'
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
