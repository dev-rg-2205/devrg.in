<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../app/config/database.php';
require '../../app/controllers/PageBannerController.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        $controller = new PageBannerController($db);

        if (!isset($_GET['id'])) {
            throw new Exception('ID is missing');
        }

        $id = $_GET['id'];

        // ✅ IMPORTANT: $_FILES pass karo
        
         $image = null;
        if (!empty($_FILES['updatedPageBannerImage']['name'])) {
            $image = $_FILES['updatedPageBannerImage'];
        }

        $result = $controller->update($id, $_POST, $image);


        if ($result) {
            echo json_encode([
                'Status' => true,
                'Message' => 'Page Banner updated successfully'
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
