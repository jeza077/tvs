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

            $stmt = Connection::connect()->prepare("SELECT * FROM $table");
            
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

}