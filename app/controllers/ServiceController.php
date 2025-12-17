<?php
require_once __DIR__ . '/../models/ServiceModel.php';

class ServiceController {

    private $service;
    
    public function __construct($db) {
        $this->service = new Service($db);
        
        $this->createTableIfNotExists();
    }

    private function createTableIfNotExists() {
        $sql = "
            CREATE TABLE IF NOT EXISTS service (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                description TEXT NOT NULL,
                icon VARCHAR(255) NOT NULL,
                createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ";
        $this->service->exec($sql);
    }

    // ========================
    // GET ALL SERVICES     
    // ========================
    public function index() {
        return $this->service->all();
    }

    // ========================
    // CREATE SERVICE    
    // ========================
    public function store($post) {
        return $this->service->create($post);
    }

    // ========================
    // UPDATE SERVICE
    // ========================
    public function update($id, $post) {

        return $this->service->update([
            'id'      => $id,
            'title'   => $post['title'],
            'description'   => $post['description'],
            'icon' => $post['icon'],
        ]);
    }

    // ========================
    // DELETE Service
    // ========================
    public function destroy($id) {
        return $this->service->delete($id);
    }

    
}
