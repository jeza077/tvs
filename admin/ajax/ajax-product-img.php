<?php


class Prueba {

    public $imgs;

    public function img(){

        $data = $this->imgs;
        

        echo json_encode($data);
    }

}

if(isset($_FILES['file'])){

    $file = new Prueba();
    $file->imgs = $_FILES['file'];
    $file->img();
}
