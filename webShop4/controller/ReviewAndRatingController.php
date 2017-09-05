<?php

include_once ("../dao/ReviewAndRatingDao.php");

class ReviewAndRatingController {

    public static function getReviewAndRatingById($id) {
        return ReviewAndRatingDao::getReviewAndRatingById($id);
    }

    public static function getReviewAndRatingByProductId($id) {
        return ReviewAndRatingDao::getReviewAndRatingByProductId($id);
    }

}

?>