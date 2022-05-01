<?php

require_once 'connection.php';

class UserModel {


    // MOSTRAR USUARIOS
    static public function mdlShowUsers($table, $item, $valor){

        if($item != null){

            $stmt = Connection::connect()->prepare("SELECT * FROM $table AS u \n"
            . "LEFT JOIN niveles AS n ON u.id_nivel = n.id_nivel\n"
            . "LEFT JOIN estado as e ON u.id_estado = e.id_estado\n"
            . " WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            if($stmt->rowCount() > 0){
                return $stmt -> fetch();
            } else {
                return $stmt -> errorInfo();
            }

        } else {

            $stmt = Connection::connect()->prepare("SELECT * FROM $table AS u \n"
            . "LEFT JOIN niveles AS n ON u.id_nivel = n.id_nivel\n"
            . "LEFT JOIN estado as e ON u.id_estado = e.id_estado\n");
            
            $stmt -> execute();
            return $stmt -> fetchAll(PDO::FETCH_CLASS);

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

    static public function mdlUpdateProfileUser($table, $data){

        $stmt = Connection::connect()->prepare("UPDATE $table SET email = :email, password = :password WHERE id_usuario = :id_usuario");
        
        $stmt->bindParam(":email", $data['profileEmail'], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data['profilePassword'], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $data['idUserProfile'], PDO::PARAM_INT);
        
        if($stmt->execute()){

            return true;	

        }else{

            return $stmt -> errorInfo();
        
        }

    }

}
