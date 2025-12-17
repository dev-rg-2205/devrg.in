<?php
require_once __DIR__ . '/../models/BlogModel.php';

class BlogController {

    private $blog;
    private $uploadDir;

    public function __construct($db) {
        $this->blog = new Blog($db);
        $this->uploadDir = __DIR__ . "/../../public/uploads/blogs/";

        if (!is_dir($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }

        $this->createTableIfNotExists();
    }

    private function createTableIfNotExists() {
        $sql = "
            CREATE TABLE IF NOT EXISTS blogs (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                subject VARCHAR(255) NOT NULL,
                content TEXT NOT NULL,
                url VARCHAR(255) NOT NULL,
                image VARCHAR(255),
                createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ";
        $this->blog->exec($sql);
    }

    // ========================
    // GET ALL BLOGS
    // ========================
    public function index() {
        return $this->blog->all();
    }

    // ========================
    // CREATE BLOG
    // ========================
    public function store($post, $files) {
        $imageName = null;

        if (!empty($files['image']['name'])) {
            $imageName = $this->uploadImage($files['image']);
        }

        return $this->blog->create([
            'title'   => $post['title'],
            'subject' => $post['subject'],
            'content' => $post['content'],
            'url' => $post['url'],
            'image'   => $imageName
        ]);
    }

    // ========================
    // UPDATE BLOG
    // ========================
    public function update($id, $post, $image = null) {

        // 🔍 Fetch OLD image from DB
        $oldImage = $this->blog->findImageById($id);
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

        return $this->blog->update([
            'id'      => $id,
            'title'   => $post['title'],
            'subject' => $post['subject'],
            'content' => $post['content'],
            'url' => $post['url'],
            'image'   => $newImageName
        ]);
    }

    // ========================
    // DELETE BLOG
    // ========================
    public function destroy($id) {

        $image = $this->blog->findImageById($id);

        if ($image) {
            $path = $this->uploadDir . $image;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        return $this->blog->delete($id);
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
        $imageName = uniqid('blog_', true) . '.' . $ext;
        $uploadPath = $this->uploadDir . $imageName;

        if (!move_uploaded_file($image['tmp_name'], $uploadPath)) {
            throw new Exception('Image upload failed');
        }

        return $imageName;
    }
}
