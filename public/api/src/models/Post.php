<?php

class Post {
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}
//ok
	public function create($titre, $auteur, $image, $contenu, $idSubject) {
		try {
			$query = $this->db->prepare("INSERT INTO Post (`titre`, `auteur`, `image`, `texte`, `sujet`) VALUES (:titre, :auteur, :image, :contenu, :idSubject)");
		    $query->bindParam(":titre",$titre);
		    $query->bindParam(":auteur",$auteur);
		    $query->bindParam(":image",$image);
		    $query->bindParam(":contenu",$contenu);
		    $query->bindParam(":idSubject",$idSubject);
		    $query->execute();
		    $status = 200;
		} catch (Exception $e){
		    $status = 400;
		}
		return $status;
	}
//ok
	public function getById($id) {
		$query = $this->db->prepare("SELECT * FROM Post WHERE id = :id;");
		$query->bindParam(":id",$id);
		$query->execute();
		$result = $query->fetchAll();
		return $result;
	}

	public function getAll() {
		$sql = "SELECT * FROM Post";
		$query = $this->db->query($sql);
		$result = $query->fetchAll();
		return $result;
	}
//ok
	public function getBySubject($subjectId) {
		$query = $this->db->prepare("SELECT * FROM Post WHERE sujet = :subjectId;");
		$query->bindParam(":subjectId",$subjectId);
		$query->execute();
		$result = $query->fetchAll();
		return $result;
	}
//ok
	public function getByTag($tagId) {
		$query = $this->db->prepare("SELECT * FROM Post INNER JOIN Tagge ON Tagge.idTag = :tagId WHERE Tagge.idPost = Post.id;");
		$query->bindParam(":tagId",$tagId);
		$query->execute();
		$result = $query->fetchAll();
		return $result;
	}
//ok
	public function delete($id) {
		$query = $this->db->prepare("SELECT * FROM Post WHERE id = :id;");
		$query->bindParam(":id",$id);
		$query->execute();
		$result = $query->fetchAll();
		if (count($result) == 1) {
			$query = $this->db->prepare("DELETE FROM Post WHERE id = :id");
			$query->bindParam(":id",$id);
			$query->execute();
			$status = 200;
		} else {
			$status = 400;
		}
		return $status;
	}
//ok
	public function likePost($id) {
		$query = $this->db->prepare("SELECT likes FROM Post WHERE id = :id");
		$query->bindParam(":id",$id);
		$query->execute();
		$result = $query->fetchAll();
		if(count($result) == 1){
			$query = $this->db->prepare("UPDATE Post SET likes =".(intval($result[0]['likes'])+1)." WHERE id = :id");
			$query->bindParam(":id",$id);
			$query->execute();
		}
	}

	public function showSearchPosts($search) {
		$query = $this->db->prepare("SELECT DISTINCT Post.* FROM Post INNER JOIN Tagge ON Post.id = Tagge.idPost INNER JOIN Tag ON Tagge.idTag = Tag.id INNER JOIN Sujet ON Post.sujet = Sujet.id WHERE Post.titre LIKE '%".$search."%' OR Post.texte LIKE '%".$search."%' OR Post.auteur LIKE '%".$search."%' OR Sujet.titre LIKE '%".$search."%' OR Tag.nom LIKE '%".$search."%';");
		$query->execute();
		$result = $query->fetchAll();
		return $result;
	}
}

?>
