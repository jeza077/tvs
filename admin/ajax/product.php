<?php

include_once('../controllers/productController.php');
include_once('../models/productModel.php');

class AjaxProduct{

    public $idProduct;

    public $nameProduct;
    public $descriptionProduct;
    public $priceProduct;
    public $categoryProduct;    

    public $idEditProduct;

    public $idDeleteProduct;

    public function ajaxShowProduct(){

        $table = 'producto';
        $item = 'id_producto';
        $valor = $this->idProduct;

        $response = ProductController::ctrShowProducts($table, $item, $valor);

        echo json_encode($response);

    }

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


    public function ajaxUpdateProduct(){

        $table = 'producto';
        $data = array(
            'nameProduct' => $this->nameProduct,
            'descriptionProduct' => $this->descriptionProduct,
            'priceProduct' => $this->priceProduct,
            'categoryProduct' => $this->categoryProduct,
            'idProduct' => $this->idEditProduct
        );

        $response = ProductController::ctrUpdateProduct($table, $data);

        echo json_encode($response);

    }
    
    public function ajaxDeleteProduct(){

        $table = 'producto';
        $id = $this->idDeleteProduct;

        $response = ProductController::ctrDeleteProduct($table, $id);

        echo json_encode($response);

    }

    

}


// Mostrar Producto
if(isset($_POST['idProduct'])){
    $idProduct = new AjaxProduct();
    $idProduct->idProduct = $_POST['idProduct'];
    $idProduct->ajaxShowProduct();
}

// Guardar Producto
if(isset($_POST["nameProduct"])){
    $products = new AjaxProduct();
    $products->nameProduct = $_POST["nameProduct"];
    $products->descriptionProduct = $_POST["descriptionProduct"];
    $products->priceProduct = $_POST["priceProduct"];
    $products->categoryProduct = $_POST["categoryProduct"];
    $products->ajaxSaveProduct();
}

// Editar Producto
if(isset($_POST['idEditProduct'])){
    $editProduct = new AjaxProduct();
    $editProduct->idEditProduct = $_POST['idEditProduct'];
    $editProduct->nameProduct = $_POST["editNameProduct"];
    $editProduct->descriptionProduct = $_POST["editDescriptionProduct"];
    $editProduct->priceProduct = $_POST["editPriceProduct"];
    $editProduct->categoryProduct = $_POST["editCategoryProduct"];
    $editProduct->ajaxUpdateProduct();
}

// Eliminar Producto
if(isset($_POST['idDeleteProduct'])){
    $idDeleteProduct = new AjaxProduct();
    $idDeleteProduct->idDeleteProduct = $_POST['idDeleteProduct'];
    $idDeleteProduct->ajaxDeleteProduct();
}