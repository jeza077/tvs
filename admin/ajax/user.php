<?php

require_once('../controllers/userController.php');
require_once('../models/userModel.php');

class AjaxUser {
    
    public $idUserProfile;  
    public $email;  
    public $password; 

    public function ajaxUpdateProfileUser(){

        $table = 'usuarios';
        $data = array(
            'idUserProfile' => $this->idUserProfile,
            'profileEmail' => $this->email,
            'profilePassword' => $this->password
        );

        $response = UserController::ctrUpdateProfileUser($table, $data);

        echo json_encode($response);

    }

}

if(isset($_POST['profileEmail'])){
    $updateProfile = new AjaxUser();
    $updateProfile->idUserProfile = $_POST['idUserProfile'];
    $updateProfile->email = $_POST['profileEmail'];
    $updateProfile->password = $_POST['profilePassword'];
    $updateProfile->ajaxUpdateProfileUser();
}