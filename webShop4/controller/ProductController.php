<?php

include_once "../helper/init.php";
include_once ("../dao/ProductDao.php");

class ProductController {

    public static function getAllProducts($category, $numberPerPage, $offset) {
        $_SESSION['categoryId'] = $category;
        return ProductDao::getAllProducts($category, $numberPerPage, $offset);
    }

    public static function getProductsCount($category, $numberPerPage) {
        $count = ProductDao::getProductsCount($category);
        return +$count / +$numberPerPage;
    }

    public static function getHighlightedProducts() {
        return ProductDao::getHighlightedProducts(4);
    }

    public static function getNewProducts() {
        return ProductDao::getNewProducts(4);
    }

    public static function getProductById($id) {
        return ProductDao::getProductById($id);
    }

    public static function getProductsByCategoryAndExcludeOneRow($id, $category) {
        return ProductDao::getProductenByCategoryAndExcludeOneRow($id, $category, 4);
    }

    public static function addProductToCart($id) {
        if (isset($_SESSION['cart'])) {
            $cartArr = $_SESSION['cart'];
            if (array_key_exists($id, $cartArr)) {
                $count = $cartArr[$id];
                $cartArr[$id] = $count + 1;
            } else {
                $cartArr[$id] = 1;
            }
            $_SESSION['cart'] = $cartArr;
        } else {
            $array = array();
            $array[$id] = 1;
            $_SESSION['cart'] = $array;
            echo 'DF';
        }
    }

    public static function removeFromCart($id, $removeProduct) {
        if (isset($_SESSION['cart'])) {
            $cartArr = $_SESSION['cart'];
            if (array_key_exists($id, $cartArr)) {
                if ($removeProduct === 'true') {
                    unset($cartArr[$id]);
                } else {
                    $count = $cartArr[$id];
                    if ($count !== 1) {
                        $cartArr[$id] = $count - 1;
                    }
                }
            }
            $_SESSION['cart'] = $cartArr;
        }
    }

}

?>