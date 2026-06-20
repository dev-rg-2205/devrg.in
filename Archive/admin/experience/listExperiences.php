<?php
header('Content-Type: application/json');
require '../../app/config/database.php';
require '../../app/controllers/ExperienceController.php';

try {
    $controller = new ExperienceController($db);
    $experiences = $controller->index();
  
    echo json_encode([
        'Status'  => true,
        'Message' => 'Experiences retrieved is successfully',
        'Code'    => 200,
        'Data'    => $experiences
    ], JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode([
        'Status'  => false,
        'Message' => $e->getMessage(),
        'Code'    => 500,
        'Data'    => []
    ], JSON_PRETTY_PRINT);
}
