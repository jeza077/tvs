<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/tvs/admin/controllers/helperController.php';

class CategoryController {

    static public function ctrShowCategories($table, $item, $valor){

        $response = CategoryModel::mdlShowCategories($table, $item, $valor);

        return $response;

    }

    static public function ctrSaveCategory($table, $data){

        if(isset($data)){

            $response = CategoryModel::mdlSaveCategory($table, $data);

            // return $response;

            if($response === true){

                $resp = 'success';
                $msg = 'Categoría guardada correctamente.';

                $response = HelperController::ctrReturnResponseJson($resp, $msg);

                return $response;

            }

        }

    }

    static public function ctrUpdateCategory($table, $id, $valor){
        if(isset($id)){

            $response = CategoryModel::mdlUpdateCategory($table, $id, $valor);

            if($response === true){

                $resp = 'success';
                $msg = 'Categoría editada correctamente.';

                $response = HelperController::ctrReturnResponseJson($resp, $msg);

                return $response;

            }

        }
    }

    static public function ctrDeleteCategory($table, $id){

        if(isset($id)){

            $response = CategoryModel::mdlDeleteCategory($table, $id);

            if($response === true){

                $resp = 'success';
                $msg = 'Categoría eliminada correctamente.';

                $response = HelperController::ctrReturnResponseJson($resp, $msg);

                return $response;

            }

        }
    }

}