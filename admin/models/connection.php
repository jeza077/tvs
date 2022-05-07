<?php

class Connection{

	public static function infoDB(){

		$infoDB = array(
			'database' => 'tvs',
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

	static public function jwt($id, $email){

		$time = time();
		$token = array(
			'iat' => $time,
			'exp' => $time + (60 * 60 * 24),
			'data' => [
				'id' => $id,
				'email' => $email
			]
		);

		return $token;

	}

}