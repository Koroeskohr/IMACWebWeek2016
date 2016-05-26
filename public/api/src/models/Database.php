<?php

use Slim\App;

class Database {
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	static public function exec($sql) {
		//$result = $container['db']->exec($sql);
		//Slim::registerAutoloader();
		//Slim::getInstance()->db->exec($sql);
	}

	static public function query($sql) {
		//$result = $container['db']->query($sql);
	//	\Slim\Slim::getInstance()->db->query($sql);
		//$this->db->query($sql);
		//\Slim\App::getInstance();
	}
}

?>