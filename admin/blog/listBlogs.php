<?php
header('Content-Type: application/json');
require '../../app/config/database.php';
require '../../app/controllers/BlogController.php';

try {
    $controller = new BlogController($db);
    $blogs = $controller->index();

    echo json_encode([
        'Status'  => true,
        'Message' => 'Blogs retrieved successfully',
        'Code'    => 200,
        'Data'    => $blogs
    ], JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode([
        'Status'  => false,
        'Message' => $e->getMessage(),
        'Code'    => 500,
        'Data'    => []
    ], JSON_PRETTY_PRINT);
}
