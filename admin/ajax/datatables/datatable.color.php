<?php

require_once '../../controllers/colorController.php';
require_once '../../models/colorModel.php';

class ColorDatatable{

    public function showColors(){

        $table = 'colores';
        $item = null;
        $valor = null;
        $colors = ColorController::ctrShowColors($table, $item, $valor);

        // echo json_encode($colors);

        // $buttons = "<button class='btn btn-warning btn-xs me-1' data-toggle='tooltip' data-original-title='Editar categoría'>Editar</button><button class='btn btn-outline-danger btn-xs' data-toggle='tooltip' data-original-title='Eliminar categoría'>Eliminar</button>";
        
        $dataJson = '{
            "data": [';
            for($i = 0; $i < count($colors); $i++){

                $buttons = "<button class='btn btn-warning btn-xs me-1' data-toggle='tooltip' data-original-title='Editar categoría' id='btnEditColor' idColor='".$colors[$i]['id_color']."'>Editar</button><button class='btn btn-outline-danger btn-xs' data-toggle='tooltip' data-original-title='Eliminar categoría' id='btnDeleteColor' idColor='".$colors[$i]['id_color']."'>Eliminar</button>";

                $key = "<div class='d-flex px-2 py-1'><div class='text-md font-weight-bold mb-0'>".($i+1)."</div></div>";
                $color = "<div class='text-md font-weight-bold mb-0'>".$colors[$i]["colores"]."</div>";
                $hexadecimal = "<div class='text-md font-weight-bold mb-0'><span class='minicolors-swatch minicolors-sprite minicolors-input-swatch color-frame'><span class='minicolors-swatch-color' style='background-color:".$colors[$i]["hexadecimal"]."'></span></span>".$colors[$i]["hexadecimal"]."</div>";

                $dataJson .='[
                        "'.$key.'",
                        "'.$color.'",
                        "'.$hexadecimal.'",
                        "'.$buttons.'"
                    ],';

            }

            $dataJson = substr($dataJson, 0, -1);
            
            $dataJson .= '] 
        
        }';
        
        echo $dataJson;

    }

}



$showColors = new ColorDatatable();
$showColors->showColors();