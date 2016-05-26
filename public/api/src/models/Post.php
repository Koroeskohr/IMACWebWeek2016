<?php

class Post {
	private $db;

	public function __construct($db) {
		$this->db = $db; 
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
}

?>