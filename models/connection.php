<?php

class Connection{

	public static function connect(){

		$link = new PDO("mysql:host=localhost:3308;dbname=tvs_prueba",
			            "root",
			            "");

		$link->exec("set names utf8");

		return $link;

	}

}