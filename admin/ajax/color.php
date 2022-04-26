<?php

require_once('../controllers/colorController.php');
require_once('../models/colorModel.php');

class AjaxColor {

    public $idColor;
    
    public $nameColor;
    public $colorHex;

    public function ajaxShowColor(){

        $table = 'colores';
        $item = 'id_color';
        $valor = $this->idColor;

        $response = ColorController::ctrShowColors($table, $item, $valor);

        echo json_encode($response);

    }

    public function ajaxSaveColor(){

        $table = 'colores';

        $data = array(
            'nameColor' => $this->nameColor,
            'colorHex' => $this->colorHex
        );

        $response = ColorController::ctrSaveColor($table, $data);

        echo json_encode($response);

    }


    public function ajaxEditColor(){

        $table = 'colores';
        $data = array(
            'editIdColor' => $this->idColor,
            'editNameColor' => $this->nameColor,
            'editColorHex' => $this->colorHex
        );

        $response = ColorController::ctrUpdateColor($table, $data);

        echo json_encode($response);

    }

}


// Mostrar colores
if(isset($_POST['idColor'])){
    $showColors = new AjaxColor();
    $showColors->idColor = $_POST['idColor'];
    $showColors->ajaxShowColor();
}


// Guardar color
if(isset($_POST['colorHex'])){
    $saveColor = new AjaxColor();
    $saveColor->nameColor = $_POST['nameColor'];
    $saveColor->colorHex = $_POST['colorHex'];
    $saveColor->ajaxSaveColor();
}

// Editar color
if(isset($_POST['editNameColor'])){
    $editColor = new AjaxColor();
    $editColor->idColor = $_POST['editIdColor'];
    $editColor->nameColor = $_POST['editNameColor'];
    $editColor->colorHex = $_POST['editColorHex'];
    $editColor->ajaxEditColor();
}