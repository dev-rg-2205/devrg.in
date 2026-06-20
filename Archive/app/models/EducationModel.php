<?php

class Education {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

       // Add this method so controller can run raw SQL
    public function exec($sql) {
        return $this->db->exec($sql);
    }

    public function findImageById($id) {
    $stmt = $this->db->prepare("SELECT image FROM education WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetchColumn();
    }


    public function all() {
    $stmt = $this->db->query("SELECT * FROM education ORDER BY id DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);  // <- fetch all results as array
  }


    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM education WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

   public function create($data) {
    $stmt = $this->db->prepare(
        "INSERT INTO education (course, university, startYear, endYear , detail ) VALUES (?,?,?,?,?)"
    );
    return $stmt->execute([
        $data['course'],
        $data['university'],
        $data['startYear'],
        $data['endYear'],
        $data['detail']
    ]);
}

public function update($data) {
    $stmt = $this->db->prepare(
        "UPDATE education SET course=?, university=?, startYear=?, endYear=?, detail=? WHERE id=?"
    );
    return $stmt->execute([
        $data['course'],
        $data['university'],
        $data['startYear'],
        $data['endYear'],
        $data['detail'],
        $data['id']
    ]);
}

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM education WHERE id=?");
        return $stmt->execute([$id]);
    }
}
