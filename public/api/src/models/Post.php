<?php

require 'Database.php';

class Post {
	static public function getById($id) {
		$sql = "SELECT * FROM Post WHERE id = ".$id.";";
		$result = Database::query($sql);
		//$result = $query->fetchAll();
		return $result;
	}
}

?>