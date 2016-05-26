<?php

class Topic {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($titre) {
        try{
            $query = $this->db->prepare("SELECT * FROM Sujet WHERE titre = :titre");
            $query->bindValue(":titre",$titre);
            $query->execute();
            $result = $query->fetchAll();
            if (count($result) == 0) {
                $query = $this->db->prepare("INSERT INTO Sujet (`titre`) VALUES (:titre)");
                $query->bindValue(":titre",$titre);
                $query->execute();
                return 200;
            } else {
                return 202;
            }
        } catch (Exception $e){
            return 400;
        }
    }

    public function getAll() {
        $query = $this->db->prepare("SELECT * FROM Sujet");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function update($id,$titre) {
        try {
            $query = $this->db->prepare("SELECT * FROM Sujet WHERE id = :id");
            $query->bindValue(":id",$id);
            $query->execute();
            $result = $query->fetchAll();
            if (count($result) == 1) {
                $query = $this->db->prepare("UPDATE Sujet SET titre = :titre WHERE id=:id");
                $query->bindValue(":titre", $titre);
                $query->bindValue(":id", $id);
                $query->execute();
            }
            return 200;
        } catch(Exception $e) {
            return 400;
        }
    }

    public function delete($id) {
        try{
            $query = $this->db->prepare("SELECT * FROM Sujet WHERE id = :id");
            $query->bindValue(":id",$id);
            $query->execute();
            $result = $query->fetchAll();
            if (count($result) == 1) {
                $query = $this->db->prepare("DELETE FROM Sujet WHERE id = :id");
                $query->bindValue(":id",$id);
                $query->execute();
            }
          return 200;
        } catch(Exception $e) {
          return 400;
        }
    }
}

?>
