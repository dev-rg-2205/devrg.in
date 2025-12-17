<?php
header('Content-Type: application/json');
require '../../app/config/database.php';
require '../../app/controllers/SkillController.php';

try {
    $controller = new SkillController($db);
    $skills = $controller->index();
  
    echo json_encode([
        'Status'  => true,
        'Message' => 'Skills retrieved is successfully',
        'Code'    => 200,
        'Data'    => $skills
    ], JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode([
        'Status'  => false,
        'Message' => $e->getMessage(),
        'Code'    => 500,
        'Data'    => []
    ], JSON_PRETTY_PRINT);
}
