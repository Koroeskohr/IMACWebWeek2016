<?php

class Post {
	private $db;

	public function __construct($db) {
		$this->db = $db; 
	}

	public function create($titre, $auteur, $image, $contenu, $idSubject) {
		try {
			$sql = "INSERT INTO Post (`titre`, `auteur`, `image`, `texte`, `sujet`) VALUES ('".$titre."', '".$auteur."', '".$image."', '".$contenu."', '".$idSubject."')";
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

	public function getByTag($tagId) {
		$sql = "SELECT * FROM Post INNER JOIN Tagge ON Tagge.idTag = ".$tagId." WHERE Tagge.idPost = Post.id;";
		$query = $this->db->query($sql);
		$result = $query->fetchAll();
		return $result;
	}

	public function delete($id) {
		$sql = "SELECT * FROM Post WHERE id = ".$id.";";
		$query = $this->db->query($sql);
		$result = $query->fetchAll();
		if (count($result) == 1) {
			$sql = "DELETE FROM Post WHERE id = ".$id;
			$query = $this->db->query($sql);
			$status = 200;
		} else {
			$status = 400;
		}
		return $status;
	}
}

?>
