<?php

class UserController {


    static public function ctrShowUsers($table, $item, $valor){

        $response = UserModel::mdlShowUsers($table, $item, $valor);

        return $response;

    }

    static public function ctrLogin($table, $data){

        if(isset($data)){
            // return ($data['email']);

            $passEncriptada = crypt($data['password'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            // return $passEncriptada;

            $item = 'email';
            $valor = $data['email'];

            $response = UserController::ctrShowUsers($table, $item, $valor);

            if($data['email'] === $response['email'] && $passEncriptada === $response['password']){
                session_start();
                $_SESSION['login'] = true;

                // $datos = array(
                //     'session' => $_SESSION['login'],
                //     'success' => true,
                // );
                // return $datos;
                return true;
            } else {
                return false;
            }
            
            
        }
    }

    static public function ctrLogout() {
        session_start();
        if(session_destroy()){
            
            return true;
        }
    }

}
