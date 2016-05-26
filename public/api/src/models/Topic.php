<?php

class Topic {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($titre) {
        $sql = "SELECT * FROM Sujet WHERE titre = '".$titre."';";
        $query = $this->db->query($sql);
        $result = $query->fetchAll();
        if (count($result) == 0) {
           $sql = "INSERT INTO Sujet (`titre`) VALUES ('".$titre."');";
           $query = $this->db->query($sql);
           return 200;
        } else {
            return 202;
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM Sujet";
        $query = $this->db->query($sql);
        $result = $query->fetchAll();
        return $result;
    }

    public function update($id,$titre) {
        $sql = "SELECT * FROM Sujet WHERE id = '".$id."';";
        $query = $this->db->query($sql);
        $result = $query->fetchAll();
        if (count($result) == 1) {
            $sql = "UPDATE Sujet SET titre ='".$titre."' WHERE id=".$id.";";
            $query = $this->db->query($sql);
        }
        return 200;
    }

    public function delete($id) {
        try{
          $sql = "SELECT * FROM Sujet WHERE id = ".$id;
          $query = $this->db->query($sql);
          $result = $query->fetchAll();
          if (count($result) == 1) {
            $sql = "DELETE FROM Sujet WHERE id = ".$id;
            $query = $this->db->query($sql);
          }
          return 200;
        } catch(Exception $e) {
          return 400;
        }
    }
}

?>
