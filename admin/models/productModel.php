<?php

require_once 'connection.php';

class ProductModel {

    static public function mdlShowProducts($table, $item, $valor){

        if($item != null){

            $stmt = Connection::connect()->prepare("SELECT p.*, c.* FROM $table AS p"
            . " LEFT JOIN categorias AS c ON p.id_categoria = c.id_categoria"
            . " WHERE $item = :$item AND estado = 1");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            if($stmt->rowCount() > 0){
                return $stmt -> fetch();
            } else {
                return $stmt -> errorInfo();
            }

        } else {

            $stmt = Connection::connect()->prepare("SELECT p.*, c.* FROM $table AS p"
            . " LEFT JOIN categorias AS c ON p.id_categoria = c.id_categoria"
            . " WHERE estado = 1");
            
            $stmt -> execute();
            return $stmt -> fetchAll();

        }

        $stmt -> close();
        $stmt = null;

    }

    static public function mdlPruebaShowProducts($table, $item, $valor){

        if($item != null){

            $stmt = Connection::connect()->prepare("SELECT p.*, p.id_producto as id, c.*, ip.* FROM $table AS p"
            . " LEFT JOIN categorias AS c ON p.id_categoria = c.id_categoria"
            . " LEFT JOIN img_producto AS ip ON p.id_producto = ip.id_producto"
            . " WHERE p.$item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            if($stmt->rowCount() > 0){
                return $stmt -> fetchAll(PDO::FETCH_ASSOC);
            } else {
                return $stmt -> errorInfo();
            }

        } else {

            $stmt = Connection::connect()->prepare("SELECT p.*, p.id_producto as id, c.*, ip.* FROM $table AS p"
            . " LEFT JOIN categorias AS c ON p.id_categoria = c.id_categoria"
            . " LEFT JOIN img_producto AS ip ON p.id_producto = ip.id_producto");
            
            $stmt -> execute();
            return $stmt -> fetchAll();

        }

        $stmt -> close();
        $stmt = null;

    }

    static public function mdlSaveProduct($table, $data){
     
        $stmt = Connection::connect()->prepare("INSERT INTO $table (nombre_producto, descripcion_producto, sku, precio, id_categoria) VALUES (:nombre_producto, :descripcion_producto, :sku, :precio, :id_categoria)");

        $stmt -> bindParam(":nombre_producto", $data['nameProduct'], PDO::PARAM_STR);
        $stmt -> bindParam(":descripcion_producto", $data['descriptionProduct'], PDO::PARAM_STR);
        $stmt -> bindParam(":sku", $data['skuProduct'], PDO::PARAM_STR);
        $stmt -> bindParam(":precio", $data['priceProduct'], PDO::PARAM_STR);
        $stmt -> bindParam(":id_categoria", $data['categoryProduct'], PDO::PARAM_INT);

        if($stmt->execute()){
            return true;
        } else {
            return $stmt -> errorInfo();
        }

        $stmt -> close();

    }
    
    static public function mdlSaveImagesProduct($table, $idProduct, $url){

        $stmt = Connection::connect()->prepare("INSERT INTO $table (id_producto, url_img) VALUES (:id_producto, :url_img)");

        $stmt -> bindParam(":id_producto", $idProduct, PDO::PARAM_INT);
        $stmt -> bindParam(":url_img", $url, PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        } else {
            return $stmt -> errorInfo();
        }

        $stmt -> close();

    }

    static public function mdlUpdateProduct($table, $data){
        
        $stmt = Connection::connect()->prepare("UPDATE $table SET nombre_producto = :nombre_producto, descripcion_producto = :descripcion_producto, precio = :precio, id_categoria = :id_categoria WHERE id_producto = :id_producto");

        $stmt -> bindParam(":nombre_producto", $data['nameProduct'], PDO::PARAM_STR);
        $stmt -> bindParam(":descripcion_producto", $data['descriptionProduct'], PDO::PARAM_STR);
        $stmt -> bindParam(":precio", $data['priceProduct'], PDO::PARAM_STR);
        $stmt -> bindParam(":id_categoria", $data['categoryProduct'], PDO::PARAM_STR);
        $stmt -> bindParam(":id_producto", $data['idProduct'], PDO::PARAM_INT);

        if($stmt->execute()){
            return true;
        } else {
            return $stmt -> errorInfo();
        }

        $stmt -> close();

		$stmt = null;
    }

    static public function mdlDeleteProduct($table, $data){

		// $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id_producto = :id_producto");

		// $stmt -> bindParam(":id_producto", $id, PDO::PARAM_INT);

        $stmt = Connection::connect()->prepare("UPDATE $table SET estado = :estado WHERE id_producto = :id_producto");

        $stmt -> bindParam(":estado", $data['status'], PDO::PARAM_INT);
        $stmt -> bindParam(":id_producto", $data['id'], PDO::PARAM_INT);

		if($stmt -> execute()){
			return true;
		}else{
            return $stmt -> errorInfo();
		}

		$stmt -> close();

		$stmt = null;

	}

}