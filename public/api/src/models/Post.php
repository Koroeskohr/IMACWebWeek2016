<?php

class Post {
	private $db;

	public function __construct($db) {
		$this->db = $db; 
	}

	public function create($titre, $auteur, $image, $contenu, $idSubject) {
		try {
			if (empty($image))
				$sql = "INSERT INTO Post (`titre`, `auteur`, `image`, `texte`, `sujet`) VALUES ('".$titre."', '".$auteur."', NULL, '".$contenu."', '".$idSubject."')";
			else
				$sql = "INSERT INTO Post (`titre`, `auteur`, `image`, `texte`, `sujet`) VALUES ('".$titre."', '".$auteur."', '".$image."', '".$contenu."', '".$idSubject."')";
		    echo $sql;
		    $query = $this->db->query($sql);
		    $status = 200;
		} catch (Exception $e){
		    $status = 400;
		}
		return $status;
	}

	public function getById($id) {
		$sql = "SELECT * FROM Post WHERE id = ".$id.";";
		$result = $this->db->query($sql);
		$result = $result->fetchAll();
		return $result;
	}

	public function getAll() {
		$sql = "SELECT * FROM Post";
		$query = $this->db->query($sql);
		$result = $query->fetchAll();
		return $result;
	}

	public function getBySubject($subjectId) {
		$sql = "SELECT * FROM Post WHERE sujet =".$subjectId.";";
		$query = $this->db->query($sql);
		$result = $query->fetchAll();
		return $result;
	}
}

?>