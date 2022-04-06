<?php

class Connection{

	public static function infoDB(){

		$infoDB = array(
			'database' => 'tvs_prueba',
			'user' => 'root',
			'pass' => ''
		);

		return $infoDB;
	}

	public static function connect(){

		try{

			$link = new PDO(
				"mysql:host=localhost:3308;dbname=".Connection::infoDB()['database'],
				Connection::infoDB()['user'],
				Connection::infoDB()['pass']
			);
	
			$link->exec("set names utf8");
	
			return $link;

		} catch(Exception $e){

			die('Error:'.$e->getMessage());

		}



	}

}