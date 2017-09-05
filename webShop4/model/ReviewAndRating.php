<?php

class ReviewAndRating {

    public $id;
    public $personId;
    public $productId;
    public $rating;
    public $review;
    public $creationTime;
    public $creationDate;

    public function _Construct($id, $personId, $productId, $rating, $review, $creationTime, $creationDate) {
        $this->id = $id;
        $this->personId = $personId;
        $this->productId = $productId;
        $this->rating = $rating;
        $this->review = $review;
        $this->creationTime = $creationTime;
        $this->creationDate = $creationDate;
    }

}
