<?php
require_once __DIR__ . '/../models/EducationModel.php';

class EducationController {

    private $education;
    private $uploadDir;

    public function __construct($db) {
        $this->education = new Education($db);
        
        $this->createTableIfNotExists();
    }

    private function createTableIfNotExists() {
        $sql = "
            CREATE TABLE IF NOT EXISTS education (
                id INT AUTO_INCREMENT PRIMARY KEY,
                course VARCHAR(255) NOT NULL,
                university VARCHAR(255) NOT NULL,
                startYear VARCHAR(255) NOT NULL,
                endYear VARCHAR(255) NOT NULL,
                detail TEXT,
                createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ";
        $this->education->exec($sql);
    }

    // ========================
    // GET ALL EDUCATION     
    // ========================
    public function index() {
        return $this->education->all();
    }

    // ========================
    // CREATE EDUCATION
    // ========================
    public function store($post) {
        return $this->education->create($post);
    }

    // ========================
    // UPDATE EDUCATION
    // ========================
    public function update($id, $post) {
   
        return $this->education->update([
            'id'      => $id,
            'course'   => $post['course'],
            'university'   => $post['university'],
            'startYear' => $post['startYear'],
            'endYear' => $post['endYear'],
            'detail'   => $post['detail']
        ]);
    }

    // ========================
    // DELETE Education
    // ========================
    public function destroy($id) {
        return $this->education->delete($id);
    }

    
}
