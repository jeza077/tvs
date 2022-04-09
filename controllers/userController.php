<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/tvs/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/tvs/models/connection.php';

class UserController {


    static public function ctrShowUsers($table, $item, $valor){

        $response = UserModel::mdlShowUsers($table, $item, $valor);

        return $response;

    }

    static public function ctrLogin($table, $data){

        if(isset($data)){
            // return $data;
            if(preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/', $data['email'])){

                $passEncriptada = crypt($data['password'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                // return $passEncriptada;
    
                $item = 'email';
                $valor = $data['email'];
    
                $response = UserController::ctrShowUsers($table, $item, $valor);
    
                if($response[0] == '0'){
                    return array(
                        'res' => 'error',
                        'msg' => 'email no coincide'
                    );
                } else {
    
                    if($passEncriptada === $response['password']){
                        // return 'iguales';
                        $id = $response['id_usuario'];
                        $email = $response['email'];
    
                        // Mandar info para la data que ira en el token
                        $token = Connection::jwt($id, $email);
    
                        // Generar y codificar Token
                        $jwt = Firebase\JWT\JWT::encode($token, 'bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew=', 'HS512');
    
                        $item1 = 'token';
                        $valor1 = $jwt;
                        $item2 = 'fecha_exp_token';
                        $valor2 = $token['exp'];
                        $item3 = 'id_usuario';
                        $valor3 = $id;
    
                        // return $token;
    
                        $update = UserController::ctrUpdateGlobal($table, $item1, $valor1, $item2, $valor2, $item3, $valor3);
                        if($update == true){
    
                            session_start();
                            $_SESSION['login'] = true;
                            $_SESSION['token'] = $jwt;
                            $_SESSION['id_usuario'] = $id;
    
                            return array(
                                'res' => 'success',
                                'msg' => 'logueado'
                            );
                        } else {
                            return false;
                        }
         
                    } else {
                        return array(
                            'res' => 'error',
                            'msg' => 'password no coincide'
                        );
                    }
    
                }           

            } else {
                return array(
                    'res' => 'error',
                    'msg' => 'email no valido'
                );
            }

            
        }
    }

    static public function ctrLogout() {
        session_start();
        if(session_destroy()){

            $table = 'usuarios';
            $item1 = 'token';
            $valor1 = null;
            $item2 = 'fecha_exp_token';
            $valor2 = null;
            $item3 = 'id_usuario';
            $valor3 = $_SESSION['id_usuario'];

            $update = UserController::ctrUpdateGlobal($table, $item1, $valor1, $item2, $valor2, $item3, $valor3);
            
            return true;
        }
    }

    static public function ctrUpdateGlobal($table, $item1, $valor1, $item2, $valor2, $item3, $valor3){

        $response = UserModel::mdlUpdateGlobal($table, $item1, $valor1, $item2, $valor2, $item3, $valor3);

        return $response;

    }

}
