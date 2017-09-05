<?php

include_once '../helper/init.php';
include_once "../controller/CategoryController.php";
include_once "../model/Category.php";

if (isset($_GET['addProductToCart'])) {
    if (isset($_GET['id'])) {
        include_once ("../controller/ProductController.php");
        $id = $_GET['id'];
        ProductController::addProductToCart($id);
        echo true;
    } else {
        echo false;
    }
}

if (isset($_GET['removeProductFromCart'])) {
    if (isset($_GET['id']) && isset($_GET['removeProduct'])) {
        include_once ("../controller/ProductController.php");
        $id = $_GET['id'];
        $removeProduct = $_GET['removeProduct'];
        ProductController::removeFromCart($id, $removeProduct);
        echo true;
    } else {
        echo false;
    }
}

if (isset($_GET['productsByCategory'])) {
    if (isset($_GET['id'])) {
        include_once ("../controller/ProductController.php");
        $id = $_GET['id'];
        $array = ProductController::getAllProducts($id, 4, 0);
        $htmlCode = '';
        for ($i = 0; $i < count($array); $i++) {
            $category = CategoryController::getCategoryById($array[$i]->categoryId);
            $htmlCode .= '<div class="col-sm-3">';
            $htmlCode .= '<div class="panel panel-primary">';
            $htmlCode .= '<div class="panel-heading" >';
            $htmlCode .= '<a href="./product.php?id=' . $array[$i]->id . '">';
            $htmlCode .= '' . $array[$i]->name;
            $htmlCode .= '</a>';
            $htmlCode .= '</div>';
            $htmlCode .= ' <div class="panel-body"><img src="' . $array[$i]->image . '" class="img-responsive prod-img"
                                                         style="width:100%" alt="Image">';
            $htmlCode .= '<div class="ca" id="u' . $array[$i]->id . '"  onclick="cartFunc(' . $array[$i]->id . ')><span
                                        class="glyphicon glyphicon-shopping-cart cart-in-img">';
            $htmlCode .= '</span></div>';
            $htmlCode .= '</div>';
            $htmlCode .= ' <div class="panel panel-default"> ';
            $htmlCode .= ' <a href="./product.php?id=' . $array[$i]->id . '">';
            $htmlCode .= '  <div class="panel-body">' . $category->name . '</div>';
            $htmlCode .= ' <div class="panel-footer">' . $array[$i]->price . '</div>';
            $htmlCode .= '  </a>';
            $htmlCode .= ' </div>';
            $htmlCode .= ' </div>';
            $htmlCode .= '  </div>';
        }
        $_SESSION['page'] = 0;
        echo $htmlCode;
    } else {
        echo false;
    }
}

if (isset($_GET['loadMore'])) {
    if (isset($_SESSION['page'])) {
        include_once ("../controller/ProductController.php");
        $id = $_SESSION['categoryId'];
        $page = $_SESSION['page'];
        $page++;
        if ($id === '0') {
            $id = null;
        }
        $array = ProductController::getAllProducts($id, 4, ($page * 4));
        $htmlCode = '';
        for ($i = 0; $i < count($array); $i++) {
            $category = CategoryController::getCategoryById($array[$i]->categoryId);
            $htmlCode .= '<div class="col-sm-3">';

            $htmlCode .= '<div class="panel panel-primary">';
            $htmlCode .= '<div class="panel-heading" >';
            $htmlCode .= '<a href="./product.php?id=' . $array[$i]->id . '">';
            $htmlCode .= '' . $array[$i]->name;
            $htmlCode .= '</a>';
            $htmlCode .= '</div>';
            $htmlCode .= ' <div class="panel-body"><img src="' . $array[$i]->image . '" class="img-responsive prod-img"
                                                         style="width:100%" alt="Image">';
            $htmlCode .= '<div class="ca" id="u' . $array[$i]->id . '"  onclick="cartFunc(' . $array[$i]->id . ')><span
                                        class="glyphicon glyphicon-shopping-cart cart-in-img">';
            $htmlCode .= '</span></div>';
            $htmlCode .= '</div>';
            $htmlCode .= ' <div class="panel panel-default"> ';
            $htmlCode .= ' <a href="./product.php?id=' . $array[$i]->id . '">';
            $htmlCode .= '  <div class="panel-body">' . $category->name . '</div>';
            $htmlCode .= ' <div class="panel-footer">' . $array[$i]->price . '</div>';
            $htmlCode .= '  </a>';
            $htmlCode .= ' </div>';
            $htmlCode .= ' </div>';
            $htmlCode .= '  </div>';
            $htmlCode .= '  </div>';
        }
        $_SESSION['page'] = $page;
        echo $htmlCode;
    } else {
        echo false;
    }
}
