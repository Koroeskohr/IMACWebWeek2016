<?php


require __DIR__."/../../vendor/autoload.php";

class Database {
	static public function exec($sql) {
		//$result = $container['db']->exec($sql);
		\Slim\Slim::registerAutoloader();
		\Slim\Slim::getInstance()->db->exec($sql);
	}

	static public function query($sql) {
		//$result = $container['db']->query($sql);
	//	\Slim\Slim::getInstance()->db->query($sql);
		\Slim\Slim::registerAutoloader();
	}
}

?>