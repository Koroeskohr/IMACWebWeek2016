<?php

class Comment {
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function getCommentsByPost($postId){
		$sql = "SELECT * FROM Comments WHERE reponse IS NULL AND post = ".$postId;
		$query = $this->db->query($sql);
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
		$sql = "SELECT * FROM Comments";
		$query = $this->db->query($sql);
		$result = $query->fetchAll();
		return $result;
	}

	public function create($id,$auteur,$texte){
		try{
		    $sql = "INSERT INTO Comments (`auteur`, `texte`, `post`) VALUES ('".$auteur."', '".$texte."', '".$id."');";
		    $exec = $this->db->exec($sql);
		    $status = 200;
		} catch (Exception $e){
		    $status = 400;
		}
		return $status;
	}

	public function createResponse($idPost,$idComment,$auteur,$texte){
		try{
		    $sql = "INSERT INTO Comments (`auteur`, `texte`, `post`, `reponse`) VALUES ('".$auteur."', '".$texte."', '".$idPost."', '".$idComment."');";
		    $exec = $this->db->exec($sql);
		    $status = 200;
		} catch (Exception $e){
		    $status = 400;
		}
		return $status;
	}
}

?>
