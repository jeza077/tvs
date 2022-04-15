<?php

include_once('../controllers/categoryController.php');
include_once('../models/categoryModel.php');

class AjaxCategory{

    public $category;
    public $idCategory;

    public $idEditCategory;
    public $editCategory;

    public $idDeleteCategory;

    public function ajaxShowCategory(){

        $table = 'categorias';
        $item = 'id_categoria';
        $valor = $this->idCategory;

        $response = CategoryController::ctrShowCategories($table, $item, $valor);

        echo json_encode($response);

    }

    public function ajaxSaveCategory(){

        $table = 'categorias';
        $data = $this->category;

        $response = CategoryController::ctrSaveCategory($table, $data);

        echo json_encode($response);

    }


    public function ajaxUpdateCategory(){

        $table = 'categorias';
        $id = $this->idEditCategory;
        $valor = $this->editCategory;

        $response = CategoryController::ctrUpdateCategory($table, $id, $valor);

        echo json_encode($response);

    }
    
    public function ajaxDeleteCategory(){

        $table = 'categorias';
        $id = $this->idDeleteCategory;

        $response = CategoryController::ctrDeleteCategory($table, $id);

        echo json_encode($response);

    }

    

}


// Mostrar Categoría
if(isset($_POST['idCategory'])){
    $idCategory = new AjaxCategory();
    $idCategory->idCategory = $_POST['idCategory'];
    $idCategory->ajaxShowCategory();
}

// Guardar Categoría
if(isset($_POST["category"])){
    $categories = new AjaxCategory();
    $categories->category = $_POST["category"];
    $categories->ajaxSaveCategory();
}

// Editar Categoría
if(isset($_POST['idEditCategory'])){
    $idEditCategory = new AjaxCategory();
    $idEditCategory->idEditCategory = $_POST['idEditCategory'];
    $idEditCategory->editCategory = $_POST['editCategory'];
    $idEditCategory->ajaxUpdateCategory();
}

// Eliminar Categoría
if(isset($_POST['idDeleteCategory'])){
    $idDeleteCategory = new AjaxCategory();
    $idDeleteCategory->idDeleteCategory = $_POST['idDeleteCategory'];
    $idDeleteCategory->ajaxDeleteCategory();
}