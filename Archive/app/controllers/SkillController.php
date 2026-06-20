<?php
require_once __DIR__ . '/../models/SkillModel.php';

class SkillController {

    private $skill;
    
    public function __construct($db) {
        $this->skill = new Skill($db);
        
        $this->createTableIfNotExists();
    }

    private function createTableIfNotExists() {
        $sql = "
            CREATE TABLE IF NOT EXISTS skill (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                score INT NOT NULL,
                createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ";
        $this->skill->exec($sql);
    }

    // ========================
    // GET ALL SKILLS     
    // ========================
    public function index() {
        return $this->skill->all();
    }

    // ========================
    // CREATE SKILL    
    // ========================
    public function store($post) {
        return $this->skill->create($post);
    }

    // ========================
    // UPDATE SKILL
    // ========================
    public function update($id, $post) {

        return $this->skill->update([
            'id'      => $id,
            'title'   => $post['title'],
            'score'   => $post['score'],
        ]);
    }

    // ========================
    // DELETE Skill
    // ========================
    public function destroy($id) {
        return $this->skill->delete($id);
    }

    
}
