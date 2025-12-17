<?php

class Skill {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

       // Add this method so controller can run raw SQL
    public function exec($sql) {
        return $this->db->exec($sql);
    }

    public function findImageById($id) {
    $stmt = $this->db->prepare("SELECT image FROM skill WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetchColumn();
    }


    public function all() {
    $stmt = $this->db->query("SELECT * FROM skill ORDER BY id DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);  // <- fetch all results as array
  }


    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM skill WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

   public function create($data) {
    $stmt = $this->db->prepare(
        "INSERT INTO skill (title, score) VALUES (?,?)"
    );
    return $stmt->execute([
        $data['title'],
        $data['score']
      ]);
}
    
public function update($data) {
    $stmt = $this->db->prepare(
        "UPDATE skill SET title=?, score=? WHERE id=?"
    );
    return $stmt->execute([
        $data['title'],
        $data['score'],
        $data['id'],
      ]);
}

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM skill WHERE id=?");
        return $stmt->execute([$id]);
    }
}
