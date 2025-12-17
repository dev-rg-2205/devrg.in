<?php
require_once __DIR__ . '/../models/PageBannerModel.php';

class PageBannerController {

    private $pageBanner;
    private $uploadDir;

    public function __construct($db) {
        $this->pageBanner = new PageBanner($db);
        $this->uploadDir = __DIR__ . "/../../public/uploads/pageBanners/";

        if (!is_dir($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }

        $this->createTableIfNotExists();
    }

    private function createTableIfNotExists() {
        $sql = "
            CREATE TABLE IF NOT EXISTS pageBanner (
                id INT AUTO_INCREMENT PRIMARY KEY,
                pageName VARCHAR(255) NOT NULL,
                title VARCHAR(255) NOT NULL,
                subTitle VARCHAR(255) NOT NULL,
                description TEXT NOT NULL,
                image VARCHAR(255),
                createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ";
        $this->pageBanner->exec($sql);
    }

    // ========================
    // GET ALL PAGE BANNERS     
    // ========================
    public function index() {
        return $this->pageBanner->all();
    }

    // ========================
    // CREATE PAGE BANNER
    // ========================
    public function store($post, $files) {
        $imageName = null;

        if (!empty($files['image']['name'])) {
            $imageName = $this->uploadImage($files['image']);
        }

        return $this->pageBanner->create([
            'pageName'   => $post['pageName'],
            'title'   => $post['title'],
            'subTitle'   => $post['subTitle'],
            'description' => $post['description'],
            'image'   => $imageName
        ]);
    }

    // ========================
    // UPDATE PAGE BANNER
    // ========================
    public function update($id, $post, $image = null) {

        // 🔍 Fetch OLD image from DB
        $oldImage = $this->pageBanner->findImageById($id);
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

        return $this->pageBanner->update([
            'id'      => $id,
            'pageName' => $post['pageName'],
            'title'   => $post['title'],
            'subTitle'   => $post['subTitle'],
            'description' => $post['description'],
            'image'   => $newImageName
        ]);
    }

    // ========================
    // DELETE PAGE BANNER
    // ========================
    public function destroy($id) {

        $image = $this->pageBanner->findImageById($id);

        if ($image) {
            $path = $this->uploadDir . $image;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        return $this->pageBanner->delete($id);
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
        $imageName = uniqid('pageBanner_', true) . '.' . $ext;
        $uploadPath = $this->uploadDir . $imageName;

        if (!move_uploaded_file($image['tmp_name'], $uploadPath)) {
            throw new Exception('Image upload failed');
        }

        return $imageName;
    }
}
