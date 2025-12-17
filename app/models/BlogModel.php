<?php

class Blog {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

       // Add this method so controller can run raw SQL
    public function exec($sql) {
        return $this->db->exec($sql);
    }

    public function findImageById($id) {
    $stmt = $this->db->prepare("SELECT image FROM blogs WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetchColumn();
    }


    public function all() {
    $stmt = $this->db->query("SELECT * FROM blogs ORDER BY id DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);  // <- fetch all results as array
  }


    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM blogs WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

   public function create($data) {
    $stmt = $this->db->prepare(
        "INSERT INTO blogs (title, subject, content, url, image) VALUES (?,?,?,?,?)"
    );
    return $stmt->execute([
        $data['title'],
        $data['subject'],
        $data['content'],
        $data['url'],
        $data['image']
    ]);
}

public function update($data) {
    $stmt = $this->db->prepare(
        "UPDATE blogs SET title=?, subject=?, content=?, url=?, image=? WHERE id=?"
    );
    return $stmt->execute([
        $data['title'],
        $data['subject'],
        $data['content'],
        $data['url'],
        $data['image'],
        $data['id']
    ]);
}

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM blogs WHERE id=?");
        return $stmt->execute([$id]);
    }
}
