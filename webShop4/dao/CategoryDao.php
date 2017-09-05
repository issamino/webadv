<?php

include_once ("Database.php");
include_once ("../model/Category.php");

class CategoryDao {

    public static function getAllCategories() {
        $arrayCategories = array();
        $sql = 'SELECT * FROM Categorie';
        if (database::getConnection()->connect_error) {
            die("Connection failed: " . database::getConnection()->connect_error);
        }
        $result = database::getConnection()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Category = new Category();
                $Category->id = $row['id'];
                $Category->name = $row['naam'];
                array_push($arrayCategories, $Category);
            }
        }
        return $arrayCategories;
    }

    public static function getCategoryById($id) {
        $sql = 'SELECT * FROM Categorie WHERE id=' . $id;
        if (database::getConnection()->connect_error) {
            die("Connection failed: " . database::getConnection()->connect_error);
        }
        $result = database::getConnection()->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $category = new Category();
            $category->id = $row['id'];
            $category->name = $row['naam'];
        }
        return $category;
    }

}
?>

