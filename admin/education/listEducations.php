<?php
header('Content-Type: application/json');
require '../../app/config/database.php';
require '../../app/controllers/EducationController.php';

try {
    $controller = new EducationController($db);
    $educations = $controller->index();
  
    echo json_encode([
        'Status'  => true,
        'Message' => 'Educations retrieved is successfully',
        'Code'    => 200,
        'Data'    => $educations
    ], JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode([
        'Status'  => false,
        'Message' => $e->getMessage(),
        'Code'    => 500,
        'Data'    => []
    ], JSON_PRETTY_PRINT);
}
