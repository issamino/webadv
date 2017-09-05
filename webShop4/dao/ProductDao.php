<?php

include_once("database.php");
include_once("../model/Product.php");

class ProductDao {

   public static function getAllProducts($category, $numberPerPage, $offset) {
        if ($category === null) {
            $sql = 'SELECT * FROM Product LIMIT ' . $numberPerPage . ' OFFSET ' . $offset;
        } else {
            $sql = 'SELECT * FROM Product WHERE categorieId = ' . $category . ' LIMIT ' . $numberPerPage . ' OFFSET ' . $offset;
        }
         $arrayProduct = array();
        $result = database::getConnection()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Product = new Product();
                $Product->id = $row['id'];
                $Product->categoryId = $row['categorieId'];
                $Product->name = $row['naam'];
                $Product->description = $row['beschrijving'];
                $Product->price = $row['prijs'];
                $Product->image = $row['foto'];
                $Product->highlighted = $row['uitgeligt'];
                array_push($arrayProduct, $Product);
            }
        }
        return $arrayProduct;
    }

    public static function getProductCount($category) {
        if ($categorie === null) {
            $sql = 'SELECT count(*) FROM Product';
        } else {
            $sql = 'SELECT count(*) FROM Product WHERE categorieId = ' . $categorie;
        }
        $count = database::getConnection()->query($sql)->fetch_row();
        return $count[0];
    }

    public static function getHighlightedProducts($count) {
        if ($count == 0) {
            $sql = 'SELECT * FROM Product WHERE uitgeligt ORDER BY Rand()';
        } else {
            $sql = 'SELECT * FROM Product WHERE uitgeligt ORDER BY Rand() Limit ' . $count;
        }
        $arrayProduct = array();
        $result = database::getConnection()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Product = new Product();
                $Product->id = $row['id'];
                $Product->categoryId = $row['categorieId'];
                $Product->name = $row['naam'];
                $Product->description = $row['beschrijving'];
                $Product->price = $row['prijs'];
                $Product->image = $row['foto'];
                $Product->highlighted = $row['uitgeligt'];
                array_push($arrayProduct, $Product);
            }
        }
        return $arrayProduct;
    }

    public static function getProductsByCategoryAndExcludeOneRow($id, $categoryId, $count) {
        if ($count == 0) {
            $sql = 'SELECT * FROM Product WHERE categorieId = ' . $categoryId . ' AND id <> ' . $id;
        } else {
            $sql = 'SELECT * FROM Product WHERE categorieId = ' . $categoryId . ' AND id <> ' . $id . ' LIMIT ' . $count;
        }
        if (database::getConnection()->connect_error) {
            die("Connection failed: " . database::getConnection()->connect_error);
        }
        $result = database::getConnection()->query($sql);
        $arrayProduct = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Product = new Product();
                $Product->id = $row['id'];
                $Product->categoryId = $row['categorieId'];
                $Product->name = $row['naam'];
                $Product->description = $row['beschrijving'];
                $Product->price = $row['prijs'];
                $Product->image = $row['foto'];
                $Product->highlighted = $row['uitgeligt'];
                array_push($arrayProduct, $Product);
            }
        }
        return $arrayProduct;
    }

    public static function getNewProducts($count) {
        $arrayProduct = array();
        if ($count == 0) {
            $sql = 'SELECT * FROM Product ORDER BY id DESC';
        } else {
            $sql = 'SELECT * FROM Product ORDER BY id DESC Limit ' . $count;
        }
        if (database::getConnection()->connect_error) {
            die("Connection failed: " . database::getConnection()->connect_error);
        }
        $result = database::getConnection()->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Product = new Product();
                $Product->id = $row['id'];
                $Product->categoryId = $row['categorieId'];
                $Product->name = $row['naam'];
                $Product->description = $row['beschrijving'];
                $Product->price = $row['prijs'];
                $Product->image = $row['foto'];
                $Product->highlighted = $row['uitgeligt'];
                array_push($arrayProduct, $Product);
            }
        }
        return $arrayProduct;
    }

    public static function getProductById($id) {
        $sql = 'SELECT * FROM Product WHERE id=' . $id;
        if (database::getConnection()->connect_error) {
            die("Connection failed: " . database::getConnection()->connect_error);
        }
        $result = database::getConnection()->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $Product = new Product();
            $Product->id = $row['id'];
            $Product->categoryId = $row['categorieId'];
            $Product->name = $row['naam'];
            $Product->description = $row['beschrijving'];
            $Product->price = $row['prijs'];
            $Product->image = $row['foto'];
            $Product->highlighted = $row['uitgeligt'];
        }
        return $Product;
    }

}
?>




