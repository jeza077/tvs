<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/tvs/admin/controllers/helperController.php';

class ProductController {

    static public function ctrShowProducts($table, $item, $valor) {

        $response = ProductModel::mdlShowProducts($table, $item, $valor);

        return $response;

    }


    static public function ctrSaveProduct($table, $data) {

        if(isset($data)){

            // return $data;

            $response = ProductModel::mdlSaveProduct($table, $data);

            // return $response;

            if($response === true){

                $totalId = array();
                $item = null;
                $valor = null;

                $totalProducts = ProductModel::mdlShowProducts($table, $item, $valor);
                
                foreach($totalProducts as $keyProduct => $valueProduct){
                    array_push($totalId, $valueProduct['id_producto']);
                }

                $idProduct = end($totalId);

                return array(
                    'res' => 'success',
                    'id_product' => $idProduct,
                    'nameProduct' => $data['nameProduct']
                );

                // $resp = 'success';
                // $msg = 'Producto guardado correctamente.';

                // $response = HelperController::ctrReturnResponseJson($resp, $msg);

                // return $response;

            }

        }

    }

    static public function ctrSaveImgsProduct($data, $id_product, $nameProd){
        if(isset($data)){
            // return $data;

            $dir = '../assets/img/products/'.$nameProd;

            if(!file_exists($dir)){
                // return 'nooo existe';
                mkdir($dir, 0777, true);
            } 

            if(move_uploaded_file($data['tmp_name'], '../assets/img/products/'.$nameProd.'/'. $data['name'])){

                $table = 'img_producto';
                $url_img = 'assets/img/products/'.$nameProd.'/'. $data['name'];
                
                $response = ProductModel::mdlSaveImagesProduct($table, $id_product, $url_img);

                if($response === true){

                    $resp = 'success';
                    $msg = 'Imagenes guardadas correctamente.';
    
                    $response = HelperController::ctrReturnResponseJson($resp, $msg);

                    return $response;

                } else {

                    $resp = 'error';
                    $msg = 'Algo salio mal, intentalo nuevamente.';
    
                    $response = HelperController::ctrReturnResponseJson($resp, $msg);
              
                    return $response;
                }


            } else {
                return false;
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