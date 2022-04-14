<?php

include_once('../controllers/categoryController.php');
include_once('../models/categoryModel.php');

class AjaxCategory{

    public $category;

    public function ajaxSaveCategory(){

        $table = 'categorias';
        $data = $this->category;

        $response = CategoryController::ctrSaveCategory($table, $data);

        echo json_encode($response);

    }

}


if(isset($_POST["category"])){
    $categories = new AjaxCategory();
    $categories->category = $_POST["category"];
    $categories->ajaxSaveCategory();
}