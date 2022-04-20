<?php

require_once 'connection.php';

class ProductModel {

    static public function mdlShowProducts($table, $item, $valor){

        if($item != null){

            $stmt = Connection::connect()->prepare("SELECT p.*, p.descripcion_producto as descrip, c.* FROM $table AS p"
            . " LEFT JOIN categorias AS c ON p.id_categoria = c.id_categoria"
            . " WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            if($stmt->rowCount() > 0){
                return $stmt -> fetch();
            } else {
                return $stmt -> errorInfo();
            }

        } else {

            $stmt = Connection::connect()->prepare("SELECT p.*, p.descripcion_producto as descrip, c.* FROM $table AS p"
            . " LEFT JOIN categorias AS c ON p.id_categoria = c.id_categoria");
            
            $stmt -> execute();
            return $stmt -> fetchAll();

        }

        $stmt -> close();
        $stmt = null;

    }

    static public function mdlSaveProduct($table, $data){
     
        $stmt = Connection::connect()->prepare("INSERT INTO $table (nombre_producto, descripcion_producto, precio, id_categoria) VALUES (:nombre_producto, :descripcion_producto, :precio, :id_categoria)");

        $stmt -> bindParam(":nombre_producto", $data['nameProduct'], PDO::PARAM_STR);
        $stmt -> bindParam(":descripcion_producto", $data['descriptionProduct'], PDO::PARAM_STR);
        $stmt -> bindParam(":precio", $data['priceProduct'], PDO::PARAM_STR);
        $stmt -> bindParam(":id_categoria", $data['categoryProduct'], PDO::PARAM_INT);

        if($stmt->execute()){
            return true;
        } else {
            return $stmt -> errorInfo();
        }

        $stmt -> close();

		$stmt = null;

    }

    static public function mdlDeleteProduct($table, $id){

		$stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id_producto = :id_producto");

		$stmt -> bindParam(":id_producto", $id, PDO::PARAM_INT);

		if($stmt -> execute()){
			return true;
		}else{
            return $stmt -> errorInfo();
		}

		$stmt -> close();

		$stmt = null;

	}

}