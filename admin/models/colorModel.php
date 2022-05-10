<?php

require_once 'connection.php';

class ColorModel {

    static public function mdlShowColors($table, $item, $valor){

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

            $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE estado = 1");
            
            $stmt -> execute();
            return $stmt -> fetchAll();

        }

        $stmt -> close();

    }

    static public function mdlSaveColor($table, $data){

        $stmt = Connection::connect()->prepare("INSERT INTO $table (colores, hexadecimal) VALUES (:colores, :hexadecimal)");

        $stmt-> bindParam(":colores", $data['nameColor'], PDO::PARAM_STR);
        $stmt-> bindParam(":hexadecimal", $data['colorHex'], PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        } else {
            return $stmt -> errorInfo();
        }

        $stmt->close();
    }

    static public function mdlUpdateColor($table, $data){

        $stmt = Connection::connect()->prepare("UPDATE $table SET colores = :colores, hexadecimal = :hexadecimal WHERE id_color = :id_color");

        $stmt->bindParam(":colores", $data['editNameColor'], PDO::PARAM_STR);
        $stmt->bindParam(":hexadecimal", $data['editColorHex'], PDO::PARAM_STR);
        $stmt->bindParam(":id_color", $data['editIdColor'], PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        } else {
            return $stmt -> errorInfo();
        }

        $stmt->close();

    }


    static public function mdlDeleteColor($table, $data){

        // $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id_color = :id_color");
        // $stmt-> bindParam(":id_color", $id, PDO::PARAM_INT);

        $stmt = Connection::connect()->prepare("UPDATE $table SET estado = :estado WHERE id_color = :id_color");

        $stmt -> bindParam(":estado", $data['status'], PDO::PARAM_INT);
        $stmt -> bindParam(":id_color", $data['id'], PDO::PARAM_INT);
        
        if($stmt->execute()){
            return true;
        } else {
            return $stmt -> errorInfo();
        }

        $stmt->close();

    }

    static public function mdlSaveColorProduct($table, $data){

        $colors = $data['idColor'];

        while (true) {
            $fin = false;

            $color = current($colors);
            
            $stmt = Connection::connect()->prepare("INSERT INTO $table (id_producto, id_color) VALUES (:id_producto, :id_color)");
            
            $stmt->bindParam(":id_producto", $data['idProduct'], PDO::PARAM_INT);
            $stmt->bindParam(":id_color", $color, PDO::PARAM_INT);
            
            $stmt->execute();

            $color = next($colors);
			

			if($color === false){
				$fin = true;
				break;
			}
        }

        if($fin == true){
            return true;
        } else {
            return false;
        }

        $stmt->close();
    }
}