<?php

include_once('../controllers/productController.php');
include_once('../models/productModel.php');

class AjaxProduct{

    public $nameProduct;
    public $descriptionProduct;
    public $priceProduct;
    public $categoryProduct;    

    public $idDeleteProduct;

    // public function ajaxShowCategory(){

    //     $table = 'categorias';
    //     $item = 'id_categoria';
    //     $valor = $this->idCategory;

    //     $response = CategoryController::ctrShowCategories($table, $item, $valor);

    //     echo json_encode($response);

    // }

    public function ajaxSaveProduct(){

        $table = 'producto';
        $data = array(
            'nameProduct' => $this->nameProduct,
            'descriptionProduct' => $this->descriptionProduct,
            'priceProduct' => $this->priceProduct,
            'categoryProduct' => $this->categoryProduct
        );
        

        $response = ProductController::ctrSaveProduct($table, $data);

        echo json_encode($response);

    }


    // public function ajaxUpdateCategory(){

    //     $table = 'categorias';
    //     $id = $this->idEditCategory;
    //     $valor = $this->editCategory;

    //     $response = CategoryController::ctrUpdateCategory($table, $id, $valor);

    //     echo json_encode($response);

    // }
    
    public function ajaxDeleteProduct(){

        $table = 'producto';
        $id = $this->idDeleteProduct;

        $response = ProductController::ctrDeleteProduct($table, $id);

        echo json_encode($response);

    }

    

}


// Mostrar Categoría
// if(isset($_POST['idCategory'])){
//     $idCategory = new AjaxCategory();
//     $idCategory->idCategory = $_POST['idCategory'];
//     $idCategory->ajaxShowCategory();
// }

// Guardar Categoría
if(isset($_POST["nameProduct"])){
    $products = new AjaxProduct();
    $products->nameProduct = $_POST["nameProduct"];
    $products->descriptionProduct = $_POST["descriptionProduct"];
    $products->priceProduct = $_POST["priceProduct"];
    $products->categoryProduct = $_POST["categoryProduct"];
    $products->ajaxSaveProduct();
}

// // Editar Categoría
// if(isset($_POST['idEditCategory'])){
//     $idEditCategory = new AjaxCategory();
//     $idEditCategory->idEditCategory = $_POST['idEditCategory'];
//     $idEditCategory->editCategory = $_POST['editCategory'];
//     $idEditCategory->ajaxUpdateCategory();
// }

// Eliminar Producto
if(isset($_POST['idDeleteProduct'])){
    $idDeleteProduct = new AjaxProduct();
    $idDeleteProduct->idDeleteProduct = $_POST['idDeleteProduct'];
    $idDeleteProduct->ajaxDeleteProduct();
}