<?php
header('Content-Type: application/json');
require '../../app/config/database.php';
require '../../app/controllers/ServiceController.php';

try {
    $controller = new ServiceController($db);
    $services = $controller->index();
  
    echo json_encode([
        'Status'  => true,
        'Message' => 'Services retrieved is successfully',
        'Code'    => 200,
        'Data'    => $services
    ], JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode([
        'Status'  => false,
        'Message' => $e->getMessage(),
        'Code'    => 500,
        'Data'    => []
    ], JSON_PRETTY_PRINT);
}
