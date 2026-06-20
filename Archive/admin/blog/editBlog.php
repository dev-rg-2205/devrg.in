<?php
require '../../app/config/database.php';
require '../../app/controllers/BlogController.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        $controller = new BlogController($db);
        $id = $_GET['id'];

        // ✅ IMAGE OPTIONAL
        $image = null;
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image'];
        }

        $result = $controller->update($id, $_POST, $image);

        if ($result) {
            echo json_encode([
                'Status' => true,
                'Message' => 'Blog updated successfully'
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
