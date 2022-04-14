<?php

require_once '../controllers/categoryController.php';
require_once '../models/categoryModel.php';

class CategoryDatatable{

    public function showCategories(){
        $table = "categorias";
        $item = null;
        $valor = null;
        $categories = CategoryController::ctrShowCategories($table, $item, $valor);

        // echo json_encode($categories);

        $buttons = "<button class='btn btn-warning btn-xs me-1' data-toggle='tooltip' data-original-title='Editar categoría'>Editar</button><button class='btn btn-outline-danger btn-xs' data-toggle='tooltip' data-original-title='Eliminar categoría'>Eliminar</button>";
        
        $dataJson = '{
            "data": [';
            for($i = 0; $i < count($categories); $i++){

                $key = "<div class='d-flex px-2 py-1'><div class='text-md font-weight-bold mb-0'>".($i+1)."</div></div>";
                $category = "<div class='text-md font-weight-bold mb-0'>".$categories[$i]["categorias"]."</div>";

                $dataJson .='[
                        "'.$key.'",
                        "'.$category.'",
                        "'.$buttons.'"
                    ],';

            }

            $dataJson = substr($dataJson, 0, -1);
            
            $dataJson .= '] 
        
        }';
        
        echo $dataJson;

    }

}



$showCategories = new CategoryDatatable();
$showCategories->showCategories();