<?php
header('Content-Type: application/json');
require '../../app/config/database.php';
require '../../app/controllers/PageBannerController.php';

try {
    $controller = new PageBannerController($db);
    $pageBanners = $controller->index();
  
    echo json_encode([
        'Status'  => true,
        'Message' => 'Page Banners retrieved is successfully',
        'Code'    => 200,
        'Data'    => $pageBanners
    ], JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode([
        'Status'  => false,
        'Message' => $e->getMessage(),
        'Code'    => 500,
        'Data'    => []
    ], JSON_PRETTY_PRINT);
}
