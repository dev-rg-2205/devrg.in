<?php

class Service {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

       // Add this method so controller can run raw SQL
    public function exec($sql) {
        return $this->db->exec($sql);
    }

    public function findImageById($id) {
    $stmt = $this->db->prepare("SELECT image FROM service WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetchColumn();
    }


    public function all() {
    $stmt = $this->db->query("SELECT * FROM service ORDER BY id DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);  // <- fetch all results as array
  }


    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM service WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

   public function create($data) {
    $stmt = $this->db->prepare(
        "INSERT INTO service (title, description, icon) VALUES (?,?,?)"
    );
    return $stmt->execute([
        $data['title'],
        $data['description'],
        $data['icon']
      ]);
}
    
public function update($data) {
    $stmt = $this->db->prepare(
        "UPDATE service SET title=?, description=?, icon=? WHERE id=?"
    );
    return $stmt->execute([
        $data['title'],
        $data['description'],
        $data['icon'],
        $data['id'],
      ]);
}

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM service WHERE id=?");
        return $stmt->execute([$id]);
    }
}
