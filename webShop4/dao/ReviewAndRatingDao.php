<?php

include_once("Database.php");
include_once("../model/ReviewAndRating.php");

class ReviewAndRatingDao {

    public static function getReviewAndRatingById($id) {
        $arrayReviewAndRating = array();
        $sql = 'SELECT * FROM ReviewEnRating WHERE id = ' . $id;
        if (database::getConnection()->connect_error) {
            die("Connection failed: " . database::getConnection()->connect_error);
        }
        $result = database::getConnection()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $reviewAndRating = new ReviewAndRating();
                $reviewAndRating->id = $row['id'];
                $reviewAndRating->personId = $row['persoonId'];
                $reviewAndRating->productId = $row['productId'];
                $reviewAndRating->rating = $row['rating'];
                $reviewAndRating->review = $row['review'];
            }
        }
        return $reviewAndRating;
    }

    public static function getReviewAndRatingByProductId($id) {
        $arrayReviewAndRating = array();
        $sql = 'SELECT * FROM RatingAndReview WHERE productId = ' . $id;
        if (database::getConnection()->connect_error) {
            die("Connection failed: " . database::getConnection()->connect_error);
        }
        $result = database::getConnection()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $reviewAndRating = new ReviewAndRating();
                $reviewAndRating->id = $row['id'];
                $reviewAndRating->personId = $row['persoonId'];
                $reviewAndRating->productId = $row['productId'];
                $reviewAndRating->rating = $row['rating'];
                $reviewAndRating->review = $row['review'];
                $reviewAndRating->creationTime = $row['creationTime'];
                $reviewAndRating->creationDate = $row['creationDate'];
                array_push($arrayReviewAndRating, $reviewAndRating);
            }
            return $arrayReviewAndRating;
        }
    }

}
?>








