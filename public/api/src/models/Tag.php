<?php

class Tag {
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function create($id, $tags){
		try{
		    $sql = "SELECT * FROM Post WHERE id = ".$id;
		    $query = $this->db->query($sql);
		    $result = $query->fetchAll();

		    if (count($result) == 0) { return "Le post n'existe pas";  }

		    $tabTags = explode(",", $tags);

		    foreach($tabTags as $tagCourant){
		      $sql = "SELECT id FROM Tag WHERE nom = '".$tagCourant."';";
		      $query = $this->db->query($sql);
		      $result = $query->fetchAll();
		      if (count($result) == 0) {
		         $sql = "INSERT INTO Tag (`nom`) VALUES ('".$tagCourant."');";
		         $query = $this->db->query($sql);
		         $reponse = $this->db->lastInsertId();
		      } else {
		        $reponse = $result[0]['id'];
		      }

		      $sql = "SELECT * FROM Tagge WHERE idPost = ".$id." && idTag = ".$reponse;
		      $query = $this->db->query($sql);
		      $result = $query->fetchAll();

		      if (count($result) == 0) {
		         $sql = "INSERT INTO Tagge VALUES ('".$id."','".$reponse."');";
		         $query = $this->db->query($sql);
		      }
		      return 200;
		    }
		  } catch(Exception $e) {
		    return 400;
		  }
	}

	public function show($id) {
		$sql = "SELECT * FROM Tag INNER JOIN Tagge ON Tagge.idTag = Tag.id WHERE Tagge.idPost = ".$id.";";
		$result = $this->db->query($sql);
		$result = $result->fetchAll();
		return $result;
	}
}

?>