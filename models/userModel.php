<?php

require_once 'connection.php';

class UserModel {


    // MOSTRAR USUARIOS
    static public function mdlShowUsers($table, $item, $valor){

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
            return $stmt -> fetchAll(POS::FETCH_CLASS);

        }

        $stmt -> close();
        $stmt = null;
        
    } 

    static public function mdlUpdateGlobal($table, $item1, $valor1, $item2, $valor2, $item3, $valor3){

        $stmt = Connection::connect()->prepare("UPDATE $table SET $item1 = :$item1, $item2 = :$item2 WHERE $item3 = :$item3");
        
        $stmt->bindParam(":".$item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
        $stmt->bindParam(":".$item3, $valor3, PDO::PARAM_INT);
        if($stmt->execute()){

            return true;	

        }else{

            return $stmt -> errorInfo();
        
        }

    }

}
