<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/tvs/admin/controllers/helperController.php';

class ProductController {

    static public function ctrShowProducts($table, $item, $valor) {

        $response = ProductModel::mdlShowProducts($table, $item, $valor);

        return $response;

    }


    static public function ctrSaveProduct($table, $data) {

        if(isset($data)){

            $response = ProductModel::mdlSaveProduct($table, $data);

            // return $response;

            if($response === true){

                $resp = 'success';
                $msg = 'Producto guardado correctamente.';

                $response = HelperController::ctrReturnResponseJson($resp, $msg);

                return $response;

            }

        }

    }

    static public function ctrUpdateProduct($table, $data){

        if(isset($data['idProduct'])){

            $response = ProductModel::mdlUpdateProduct($table, $data);

            if($response === true){

                $resp = 'success';
                $msg = 'Producto editado correctamente.';

                $response = HelperController::ctrReturnResponseJson($resp, $msg);

                return $response;

            }

        }
    }

    static public function ctrDeleteProduct($table, $id){

        if(isset($id)){

            $response = ProductModel::mdlDeleteProduct($table, $id);

            if($response === true){

                $resp = 'success';
                $msg = 'Producto eliminado correctamente.';

                $response = HelperController::ctrReturnResponseJson($resp, $msg);

                return $response;

            }

        }
    }


}