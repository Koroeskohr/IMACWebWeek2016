<?php

class Tag {
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function getById($id) {
		$sql = "SELECT * FROM Tag WHERE id = ".$id.";";
		$result = $this->query($sql);
		$result = $result->fetchAll();
		return $result;
	}

	public function getAll() {
		$sql = "SELECT * FROM Tag";
		$query = $this->query($sql);
		$result = $query->fetchAll();
		return $result;
	}

	public function getPostByTag(){
		$sql = "SELECT * FROM Tag" ; 
		$query = $this->query($sql);
		$result = $query->fetchAll();
		return $result;
	}
}

?>