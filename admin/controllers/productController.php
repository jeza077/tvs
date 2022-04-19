<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/tvs/admin/controllers/helperController.php';

class ProductController {

    static public function ctrSaveProduct($table, $data) {

        if(isset($data)){

            $response = CategoryProduct::mdlSaveProduct($table, $data);

            // return $response;

            if($response === true){

                $resp = 'success';
                $msg = 'Producto guardado correctamente.';

                $response = HelperController::ctrReturnResponseJson($resp, $msg);

                return $response;

            }

        }

    }

}