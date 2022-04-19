<?php

require_once 'connection.php';

class CategoryProduct {

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
}