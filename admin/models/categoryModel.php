<?php

require_once 'connection.php';

class CategoryModel {

    static public function mdlShowCategories($table, $item, $valor){

        if($item != null){

            $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            if($stmt->rowCount() > 0){
                return $stmt -> fetch();
            } else {
                return $stmt -> errorInfo();
            }

        } else {

            $stmt = Connection::connect()->prepare("SELECT * FROM $table");
            
            $stmt -> execute();
            return $stmt -> fetchAll();

        }

        $stmt -> close();
        $stmt = null;

    }

    static public function mdlSaveCategory($table, $data){
     
        $stmt = Connection::connect()->prepare("INSERT INTO $table (categorias) VALUES (:categorias)");

        $stmt -> bindParam(":categorias", $data, PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        } else {
            return $stmt -> errorInfo();
        }

        $stmt -> close();

		$stmt = null;

    }

    static public function mdlUpdateCategory($table, $id, $valor){
        
        $stmt = Connection::connect()->prepare("UPDATE $table SET categorias = :categorias WHERE id_categoria = :id_categoria");
        $stmt -> bindParam(":categorias", $valor, PDO::PARAM_STR);
        $stmt -> bindParam(":id_categoria", $id, PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        } else {
            return $stmt -> errorInfo();
        }

        $stmt -> close();

		$stmt = null;
    }

    static public function mdlDeleteCategory($table, $id){

		$stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id_categoria = :id_categoria");

		$stmt -> bindParam(":id_categoria", $id, PDO::PARAM_INT);

		if($stmt -> execute()){
			return true;
		}else{
            return $stmt -> errorInfo();
		}

		$stmt -> close();

		$stmt = null;

	}

}