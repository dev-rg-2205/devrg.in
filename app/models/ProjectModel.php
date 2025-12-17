<?php

class Project {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

       // Add this method so controller can run raw SQL
    public function exec($sql) {
        return $this->db->exec($sql);
    }

    public function findImageById($id) {
    $stmt = $this->db->prepare("SELECT image FROM projects WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetchColumn();
    }


    public function all() {
    $stmt = $this->db->query("SELECT * FROM projects ORDER BY id DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);  // <- fetch all results as array
  }


    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM projects WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

   public function create($data) {
    $stmt = $this->db->prepare(
        "INSERT INTO projects (name, url, type, image) VALUES (?,?,?,?)"
    );
    return $stmt->execute([
        $data['name'],
        $data['url'],
        $data['type'],
        $data['image']
    ]);
}

public function update($data) {
    $stmt = $this->db->prepare(
        "UPDATE projects SET name=?, url=?, type=?, image=? WHERE id=?"
    );
    return $stmt->execute([
        $data['name'],
        $data['url'],
        $data['type'],
        $data['image'],
        $data['id']
    ]);
}

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM projects WHERE id=?");
        return $stmt->execute([$id]);
    }
}
