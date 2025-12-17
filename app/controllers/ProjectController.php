<?php
require_once __DIR__ . '/../models/ProjectModel.php';

class ProjectController {

    private $project;
    private $uploadDir;

    public function __construct($db) {
        $this->project = new Project($db);
        $this->uploadDir = __DIR__ . "/../../public/uploads/projects/";

        if (!is_dir($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }

        $this->createTableIfNotExists();
    }

    private function createTableIfNotExists() {
        $sql = "
            CREATE TABLE IF NOT EXISTS projects (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                type VARCHAR(100) NOT NULL,      
                url VARCHAR(255) NOT NULL,
                image VARCHAR(255),
                createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ";
        $this->project->exec($sql);
    }

    // ========================
    // GET ALL PROJECTS     
    // ========================
    public function index() {
        return $this->project->all();
    }

    // ========================
    // CREATE PROJECT
    // ========================
    public function store($post, $files) {
        $imageName = null;

        if (!empty($files['image']['name'])) {
            $imageName = $this->uploadImage($files['image']);
        }

        return $this->project->create([
            'name'   => $post['name'],
            'type'   => $post['type'],
            'url' => $post['url'],
            'image'   => $imageName
        ]);
    }

    // ========================
    // UPDATE BLOG
    // ========================
    public function update($id, $post, $image = null) {

        // 🔍 Fetch OLD image from DB
        $oldImage = $this->project->findImageById($id);
        $newImageName = $oldImage;

        // 🟢 If NEW image uploaded
        if ($image) {
            $newImageName = $this->uploadImage($image);

            // ❌ Delete old image
            if (!empty($oldImage)) {
                $oldPath = $this->uploadDir . $oldImage;
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
        }

        return $this->project->update([
            'id'      => $id,
            'name'   => $post['name'],
            'type'=> $post['type'],
            'url' => $post['url'],
            'image'   => $newImageName
        ]);
    }

    // ========================
    // DELETE BLOG
    // ========================
    public function destroy($id) {

        $image = $this->project->findImageById($id);

        if ($image) {
            $path = $this->uploadDir . $image;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        return $this->project->delete($id);
    }

    // ========================
    // IMAGE UPLOAD (HELPER)
    // ========================
    private function uploadImage($image) {

        $ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if (!in_array($ext, $allowed)) {
            throw new Exception('Invalid image format');
        }

        // 🔥 UNIQUE IMAGE NAME
        $imageName = uniqid('project_', true) . '.' . $ext;
        $uploadPath = $this->uploadDir . $imageName;

        if (!move_uploaded_file($image['tmp_name'], $uploadPath)) {
            throw new Exception('Image upload failed');
        }

        return $imageName;
    }
}
