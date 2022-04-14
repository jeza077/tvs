<?php 

class HelperController{

    static public function ctrReturnResponseJson($resp, $msg){

        if(isset($msg)){

            return array(
                'res' => $resp,
                'msg' => $msg
            );
        }

    }

}