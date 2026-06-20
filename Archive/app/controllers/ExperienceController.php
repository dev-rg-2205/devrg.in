<?php
require_once __DIR__ . '/../models/ExperienceModel.php';

class ExperienceController {

    private $experience;
    
    public function __construct($db) {
        $this->experience = new Experience($db);
        
        $this->createTableIfNotExists();
    }

    private function createTableIfNotExists() {
        $sql = "
            CREATE TABLE IF NOT EXISTS experience (
                id INT AUTO_INCREMENT PRIMARY KEY,
                designation VARCHAR(255) NOT NULL,
                companyName VARCHAR(255) NOT NULL,
                startYear VARCHAR(255) NOT NULL,
                endYear VARCHAR(255) NOT NULL,
                detail TEXT,
                createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ";
        $this->experience->exec($sql);
    }

    // ========================
    // GET ALL EXPERIENCE     
    // ========================
    public function index() {
        return $this->experience->all();
    }

    // ========================
    // CREATE EXPERIENCE    
    // ========================
    public function store($post) {
        return $this->experience->create($post);
    }

    // ========================
    // UPDATE EXPERIENCE
    // ========================
    public function update($id, $post) {

        return $this->experience->update([
            'id'      => $id,
            'designation'   => $post['designation'],
            'companyName'   => $post['companyName'],
            'startYear' => $post['startYear'],
            'endYear' => $post['endYear'],
            'detail'   => $post['detail']
        ]);
    }

    // ========================
    // DELETE Experience
    // ========================
    public function destroy($id) {
        return $this->experience->delete($id);
    }

    
}
