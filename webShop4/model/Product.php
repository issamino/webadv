<?php

class Product {

    public $id;
    public $name;
    public $description;
    public $price;
    public $image;
    public $categoryId;
    public $highlighted;

    public function _Construct($id, $name, $description, $price, $image, $categoryId, $highlighted) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->categoryId = $categoryId;
        $this->highlighted = $highlighted;
    }

}

