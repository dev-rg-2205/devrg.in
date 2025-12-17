<?php
header('Content-Type: application/json');
require '../../app/config/database.php';
require '../../app/controllers/ProjectController.php';

try {
    $controller = new ProjectController($db);
    $projects = $controller->index();
  
    echo json_encode([
        'Status'  => true,
        'Message' => 'Projects retrieved is successfully',
        'Code'    => 200,
        'Data'    => $projects
    ], JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode([
        'Status'  => false,
        'Message' => $e->getMessage(),
        'Code'    => 500,
        'Data'    => []
    ], JSON_PRETTY_PRINT);
}
