<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/tvs/admin/controllers/helperController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/tvs/admin/models/colorModel.php';

class ProductController {


    
    static public function ctrPruebaShowProducts($table, $item, $valor) {

        $products = ProductModel::mdlPruebaShowProducts($table, $item, $valor);
        return $products;

        $prod = [];

        $idProduct = 0;
        foreach ($products as $key => $product){
            if($idProduct != $product['id']){
                echo $product['id'];

                $idProduct = $product['id'];
            }

        
        }
        return $prod;

        // while($result = $products){
        //     if($idProduct != $result['id']){
        //         echo $result['id'];

        //         $idProduct = $result['id'];
        //     }

        //     echo $result['url_img'];

        // }

        return $products;

        $prod = array();
        $idProduct = array();
        foreach($products as $key => $product) {
            $idProduct['lala'] = $product['id'];
            $nameProduct = $product['nombre_producto'];
            $category = $product['categorias'];
            $price = $product['precio'];
            $descriptionProduct = $product['descripcion_producto'];
            $imgProducts = $product['url_img'];

            // $imgProducts = array(
            //     'img'.($key+1) => $product['url_img']
            // );

            // $prod[$idProduct][$nameProduct][$category][$price][$descriptionProduct][] = $imgProducts;

            // $prod[] = $imgProducts;
            // $prod['id'] = $idProduct;
            // $prod += ['name' => $nameProduct];
            // $prod += ['category' => $category];
            // $prod += ['price' => $price];
            // $prod += ['description' => $descriptionProduct];
            // $prod += ['img' => $imgProducts];

            // $prod = array(
            //     'id' => $idProduct,
            //     'name' => $nameProduct,
            //     'category' => $category,
            //     'price' => $price,
            //     'description' => $descriptionProduct,
            //     'img' => $imgProducts
            // );

            // array_push($prod, $idProduct);
            
            // echo $idProduct;
            
        }

        return $idProduct;

    }

    // --------------------------------------------------------------------------

    static public function ctrShowProducts($table, $item, $valor) {

        $response = ProductModel::mdlShowProducts($table, $item, $valor);

        return $response;

    }


    static public function ctrSaveProduct($table, $data) {

        if(isset($data)){

            // return $data;
            $idColors = $data['idColors'];

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

                $dataColors = array(
                    'idProduct' => $idProduct,
                    'idColor' => $idColors
                );

                $table = 'colores_producto';
                $colors = ColorModel::mdlSaveColorProduct($table, $dataColors);

                if($colors === true){

                    return array(
                        'res' => 'success',
                        'id_product' => $idProduct,
                        'nameProduct' => $data['nameProduct']
                    );

                }


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

            $data = array(
                'id' => $id,
                'status' => 0
            );

            $response = ProductModel::mdlDeleteProduct($table, $data);

            if($response === true){

                $resp = 'success';
                $msg = 'Producto eliminado correctamente.';

                $response = HelperController::ctrReturnResponseJson($resp, $msg);

                return $response;

            }

        }
    }


}