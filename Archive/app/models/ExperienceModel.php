<?php

class Experience {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

       // Add this method so controller can run raw SQL
    public function exec($sql) {
        return $this->db->exec($sql);
    }

    public function findImageById($id) {
    $stmt = $this->db->prepare("SELECT image FROM experience WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetchColumn();
    }


    public function all() {
    $stmt = $this->db->query("SELECT * FROM experience ORDER BY id DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);  // <- fetch all results as array
  }


    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM experience WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

   public function create($data) {
    $stmt = $this->db->prepare(
        "INSERT INTO experience (designation, companyName, startYear, endYear , detail ) VALUES (?,?,?,?,?)"
    );
    return $stmt->execute([
        $data['designation'],
        $data['companyName'],
        $data['startYear'],
        $data['endYear'],
        $data['detail']
    ]);
}

public function update($data) {
    $stmt = $this->db->prepare(
        "UPDATE experience SET designation=?, companyName=?, startYear=?, endYear=?, detail=? WHERE id=?"
    );
    return $stmt->execute([
        $data['designation'],
        $data['companyName'],
        $data['startYear'],
        $data['endYear'],
        $data['detail'],
        $data['id']
    ]);
}

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM experience WHERE id=?");
        return $stmt->execute([$id]);
    }
}
