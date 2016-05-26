<?php

class Comment {
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function getCommentsByPost($postId){
		$query = $this->db->prepare("SELECT * FROM Comments WHERE reponse IS NULL AND post = :postId;");
		$query->bindParam(":postId",$postId);
		$query->execute();
		$result = $query->fetchAll();
		return $result;
	}

	public function getResponse($commentId){
		$id_array = explode(",", $commentId);
		$sql = "SELECT * FROM Comments WHERE reponse = ".$commentId.";";
		for ($i = 0; $i < count($id_array)-1; $i++) {
			$sql .= "post = ".$id_array[$i]." OR ";
		}
		$sql .= "post = ".$id_array[$i].";";
		$query = $this->db->query($sql);
		$result = $query->fetchAll();
		return $result;
	}

	public function getAll(){
		$query = "SELECT * FROM Comments";
		$query = $this->db->query($sql);
		$result = $query->fetchAll();
		return $result;
	}

	public function create($id,$auteur,$texte){
		try{
		    $query = $this->db->prepare("INSERT INTO Comments (`auteur`, `texte`, `post`) VALUES (:auteur, :texte, :id);");
		    $query->bindParam(":id",$id);
		    $query->bindParam(":auteur",$auteur);
		    $query->bindParam(":texte",$texte);
		    $query->execute();
		    $status = 200;
		} catch (Exception $e){
		    $status = 400;
		}
		return $status;
	}

	public function createResponse($idPost,$idComment,$auteur,$texte){
		try{
		    $query = $this->db->prepare("INSERT INTO Comments (`auteur`, `texte`, `post`, `reponse`) VALUES (:auteur, :texte, :idPost, :idComment);");
		    $query->bindParam(":idPost",$idPost);
		    $query->bindParam(":auteur",$auteur);
		    $query->bindParam(":idComment",$idComment);
		    $query->bindParam(":texte",$texte);
		    $query->execute();
		    $status = 200;
		} catch (Exception $e){
		    $status = 400;
		}
		return $status;
	}
}

?>
