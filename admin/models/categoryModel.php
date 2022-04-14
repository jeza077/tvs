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

    }

}