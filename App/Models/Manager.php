<?php 

class Manager {
	protected static $db;

	static function init()
	{
		 self::$db = self::dbConnect();
	}

	protected static function dbConnect()
	{

	$db = new PDO('mysql:host=localhost;dbname=blog_ecraivain', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

	return $db;
	}
}

Manager::init();