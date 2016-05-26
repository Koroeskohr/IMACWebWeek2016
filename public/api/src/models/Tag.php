<?php

class Tag {
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function create($id, $tags){
		try{
			$query = $this->db->prepare("SELECT * FROM Post WHERE id = :id");
			$query->bindValue(":id",$id);
			$query->execute();
			$result = $query->fetchAll();

		    if (count($result) == 0) { return "Le post n'existe pas";  }

		    $tabTags = explode(",", $tags);

		    foreach($tabTags as $tagCourant){
		    	$query = $this->db->prepare("SELECT id FROM Tag WHERE nom = :tagCourant");
		    	$query->bindValue(":tagCourant",$tagCourant);
		    	$query->execute();
		    	$result = $query->fetchAll();

			    if (count($result) == 0) {
			    	$query = $this->db->prepare("INSERT INTO Tag (`nom`) VALUES (:tagCourant)");
			    	$query->bindValue(":tagCourant",$tagCourant);
			    	$query->execute();
			       	$reponse = $this->db->lastInsertId();
			    } else {
			      	$reponse = $result[0]['id'];
			    }

			    $query = $this->db->prepare("SELECT * FROM Tagge WHERE idPost = :id && idTag = :reponse");
			    $query->bindValue(":id",$id);
			    $query->bindValue(":reponse",$reponse);
			    $query->execute();
			    $result = $query->fetchAll();

			    if (count($result) == 0) {
			    	$query = $this->db->prepare("INSERT INTO Tagge VALUES (:id , :reponse)");
			    	$query->bindValue(":id",$id);
			    	$query->bindValue(":reponse",$reponse);
			    	$query->execute();
			    }
		    }
		    return 200;
		  } catch(Exception $e) {
		    return 400;
		  }
	}

	public function show($id) {
		$query = $this->db->prepare("SELECT * FROM Tag INNER JOIN Tagge ON Tagge.idTag = Tag.id WHERE Tagge.idPost = :id");
		$query->bindValue(":id",$id);
		$query->execute();
		$result = $query->fetchAll();
		return $result;
	}
}

?>
