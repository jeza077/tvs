<?php

require_once('../controllers/colorController.php');
require_once('../models/colorModel.php');

class AjaxColor {

    public $nameColor;
    public $colorHex;

    public function ajaxSaveColor(){

        $table = 'colores';

        $data = array(
            'nameColor' => $this->nameColor,
            'colorHex' => $this->colorHex
        );

        $response = ColorController::ctrSaveColor($table, $data);

        echo json_encode($response);

    }

}

if(isset($_POST['colorHex'])){
    $saveColor = new AjaxColor();
    $saveColor->nameColor = $_POST['nameColor'];
    $saveColor->colorHex = $_POST['colorHex'];
    $saveColor->ajaxSaveColor();
}