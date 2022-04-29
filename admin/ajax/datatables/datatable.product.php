<?php

require_once '../../controllers/productController.php';
require_once '../../models/productModel.php';

class ProductDatatable{

    public function showProducts(){

        $table = "producto";
        $item = null;
        $valor = null;
        $products = ProductController::ctrShowProducts($table, $item, $valor);

        // echo json_encode($products);
        // return;

        // $buttons = "<button class='btn btn-warning btn-xs me-1' data-toggle='tooltip' data-original-title='Editar categoría'>Editar</button><button class='btn btn-outline-danger btn-xs' data-toggle='tooltip' data-original-title='Eliminar categoría'>Eliminar</button>";
        $imagen = "<img src='assets/img/products/Apache 200/apache-200-4.jpg' style='border-radius: 5px;' width='50px'>";
        $dataJson = '{
            "data": [';
            for($i = 0; $i < count($products); $i++){

                $buttons = "<button class='btn btn-warning btn-xs me-1' data-toggle='tooltip' data-original-title='Editar categoría' id='btnEditProduct' idProduct='".$products[$i]['id_producto']."'>Editar</button><button class='btn btn-outline-danger btn-xs' data-toggle='tooltip' data-original-title='Eliminar categoría' id='btnDeleteProduct' idProduct='".$products[$i]['id_producto']."'>Eliminar</button>";

                $key = "<div class='d-flex px-2 py-1'><div class='text-md font-weight-bold mb-0'>".($i+1)."</div></div>";
                $product = "<div class='text-md font-weight-bold mb-0'>".$products[$i]["nombre_producto"]."</div>";
                $category = "<div class='text-md font-weight-bold mb-0'>".$products[$i]["categorias"]."</div>";
                $price = "<div class='text-md font-weight-bold mb-0'>".$products[$i]["precio"]."</div>";
                $description = "<div class='text-md font-weight-bold mb-0'>".$products[$i]["descripcion_producto"]."</div>";
                // $description = "<div class='text-md font-weight-bold mb-0'>Apache</div>";

                $dataJson .='[
                        "'.$key.'",
                        "'.$imagen.'",
                        "'.$product.'",
                        "'.$category.'",
                        "'.$price.'",
                        "'.$buttons.'"
                    ],';

            }

            


            $dataJson = substr($dataJson, 0, -1);
            
            $dataJson .= '] 
        
        }';
        
        echo $dataJson;

    }

}



$showProducts = new ProductDatatable();
$showProducts->showProducts();