<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/tvs/admin/controllers/helperController.php';

class ColorController {

    static public function ctrShowColors($table, $item, $valor){

        $response = ColorModel::mdlShowColors($table, $item, $valor);

        return $response;

    }

    static public function ctrSaveColor($table, $data){

        if(isset($data)){

            $response = ColorModel::mdlSaveColor($table, $data);
            
            if($response === true){

                $resp = 'success';
                $msg = 'Color guardado correctamente.';

                $response = HelperController::ctrReturnResponseJson($resp, $msg);

                return $response;

            } else {
                
                $resp = 'error';
                $msg = 'Algo salio mal, intenta de nuevo.';

                $response = HelperController::ctrReturnResponseJson($resp, $msg);

                return $response;

            }

        }

    }

    static public function ctrUpdateColor($table, $data){

        if(isset($data)){

            $response = ColorModel::mdlUpdateColor($table, $data);

            if($response === true){

                $resp = 'success';
                $msg = 'Color editado correctamente.';

                $response = HelperController::ctrReturnResponseJson($resp, $msg);

                return $response;

            } else {
                
                $resp = 'error';
                $msg = 'Algo salio mal, intenta de nuevo.';

                $response = HelperController::ctrReturnResponseJson($resp, $msg);

                return $response;

            }

        }

    }

    static public function ctrDeleteColor($table, $id){

        if(isset($id)){

            $data = array(
                'id' => $id,
                'status' => 0
            );

            $response = ColorModel::mdlDeleteColor($table, $data);

            if($response === true){

                $resp = 'success';
                $msg = 'Color eliminado correctamente.';

                $response = HelperController::ctrReturnResponseJson($resp, $msg);

                return $response;

            } else {
                
                $resp = 'error';
                $msg = 'Algo salio mal, intenta de nuevo.';

                $response = HelperController::ctrReturnResponseJson($resp, $msg);

                return $response;

            }

        }

    }

}