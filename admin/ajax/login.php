<?php
    // header('Content-Type: application/json');
    include_once('../controllers/userController.php');
    include_once('../models/userModel.php');

    // switch($_SERVER['REQUEST_METHOD']){
    //     case 'PUT':

    //         echo json_encode($_POST);

        

    //     break;
    // }

    class AjaxUser{

        public $email;
        public $password;
        public $logout;
        
        public function ajaxLogin(){

            $table = 'usuarios';
            $data = array(
                'email' => $this->email,
                'password' => $this->password
            );

            $resp = UserController::ctrLogin($table, $data);
            
            echo json_encode($resp);
            
        }

        public function ajaxLogout(){
            $data = $this->logout;
            // session_destroy();
            $resp = UserController::ctrLogout();

            echo json_encode($resp);
        }
    }
    
    
    if(isset($_POST["email"])){
        $login = new AjaxUser();
        $login->email = $_POST["email"];
        $login->password = $_POST["password"];
        $login->ajaxLogin();
    }
    
    if(isset($_POST["logout"])){
        $salir = new AjaxUser();
        $salir->logout = $_POST["logout"];
        $salir->ajaxLogout();
    }