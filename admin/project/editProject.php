<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../app/config/database.php';
require '../../app/controllers/ProjectController.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        $controller = new ProjectController($db);
        $id = $_GET['id'];

        // ✅ IMAGE OPTIONAL
        $image = null;
        if (!empty($_FILES['updatedProjectImage']['name'])) {
            $image = $_FILES['updatedProjectImage'];
        }

        $result = $controller->update($id, $_POST, $image);

        if ($result) {
            echo json_encode([
                'Status' => true,
                'Message' => 'Project updated successfully'
            ]);
        } else {
            echo json_encode([
                'Status' => false,
                'Message' => 'Update failed'
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
