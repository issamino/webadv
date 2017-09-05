<?php

include_once ("../dao/CategoryDao.php");

class CategoryController {

    public static function getAllCategories() {
        return CategoryDao::getAllCategories();
    }

    public static function getCategoryById($id) {
        return CategoryDao::getCategoryById($id);
    }

}

?>
