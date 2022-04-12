<?php

class CategoryController {

    static public function ctrShowCategories($table, $item, $valor){

        $response = CategoryModel::mdlShowCategories($table, $item, $valor);

        return $response;

    }

}