<?php
namespace Library;

class PDOFactory {

	public static function getMysqlConnexion() {

		try {	
			$db = new \PDO('mysql:host=localhost;dbname=monstage', 'root', '');
			//$db->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
			$db->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_WARNING);
			$db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
			return $db;
			
		}
		catch(Exception $e) {
    		echo 'Exception -> ';
    		var_dump($e->getMessage());
    		
}
	}
}