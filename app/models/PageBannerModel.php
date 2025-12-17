<?php

class PageBanner {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

       // Add this method so controller can run raw SQL
    public function exec($sql) {
        return $this->db->exec($sql);
    }

    public function findImageById($id) {
    $stmt = $this->db->prepare("SELECT image FROM pageBanner WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetchColumn();
    }


    public function all() {
    $stmt = $this->db->query("SELECT * FROM pageBanner ORDER BY id DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);  // <- fetch all results as array
  }


    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM pageBanner WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

   public function create($data) {
    $stmt = $this->db->prepare(
        "INSERT INTO pageBanner (pageName, title, subTitle, description, image) VALUES (?,?,?,?,?)"
    );
    return $stmt->execute([
        $data['pageName'],
        $data['title'],
        $data['subTitle'],
        $data['description'],
        $data['image']
    ]);
}

public function update($data) {
    $stmt = $this->db->prepare(
        "UPDATE pageBanner SET pageName=?, title=?, subTitle=?, description=?, image=? WHERE id=?"
    );
    return $stmt->execute([
        $data['pageName'],
        $data['title'],
        $data['subTitle'],
        $data['description'],
        $data['image'],
        $data['id']
    ]);
}

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM pageBanner WHERE id=?");
        return $stmt->execute([$id]);
    }
}
