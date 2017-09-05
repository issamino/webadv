<?php
include_once "../helper/init.php";
include_once "../controller/ProductController.php";
include_once "../controller/ReviewAndRatingController.php";
include_once "../controller/PersonController.php";
include_once "../model/Person.php";
include_once './header.php';
?>
<?php
if (isset($_SESSION['admin']) && ($_SESSION['admin'] === 1 || $_SESSION['admin'] === '1')) {
    ?>
    You don't have access!
    <?php
} else {
    ?>

    <div class="container-fluid text-center">    
        <div class="row content">
            <div class="col-sm-2 sidenav">
            </div>
            <div class="col-sm-10 text-left"> 
                <?php
                $id = $_GET['id'];
                $product = ProductController::getProductById($id);
                ?>
                <h1><?php echo $product->naam; ?></h1><br/>
                <img src="<?php echo $product->foto; ?>" class="img-responsive imgProdutDetail" alt="Image"/>
                <label>Price: </label><?php echo $product->prijs; ?><br/>
                <label>Description: </label><?php echo $product->beschrijving; ?><br/>
                <span class="glyphicon glyphicon-shopping-cart cart-in-img" onclick="<?php
                echo 'cartFunc('
                . $product->id . ')'
                ?>"></span>

                <br><br>
                <div class="container">
                    <div class="row">
                        <?php
                        $array = ProductController::getProductenByCategoryAndExcludeOneRow($product->id, $product->categorieId);
                        for ($i = 0; $i < count($array); $i++) {
                            ?>
                            <div class="col-sm-2">
                                <div class="panel panel-primary">
                                    <div class="panel-heading" >
                                        <a href="./product.php?id=<?php echo $array[$i]->id; ?>">
                                            <?php echo $array[$i]->naam ?>
                                        </a>
                                    </div>
                                    <div class="panel-body"><img src="<?php echo $array[$i]->foto ?>" class="img-responsive prod-img"
                                                                 style="width:100%" alt="Image">
                                        <div class="ca" id="<?php echo 'u' . $array[$i]->id ?>"  onclick="<?php echo 'cartFunc(' . $array[$i]->id . ')' ?>"><span
                                                class="glyphicon glyphicon-shopping-cart cart-in-img">
                                            </span></div>
                                    </div>
                                    <div class="panel panel-default"> 
                                        <a href="./product.php?id=<?php echo $array[$i]->id; ?>">
                                            <div class="panel-body product-description"> <?php echo $array[$i]->beschrijving ?></div>
                                            <div class="panel-footer"> <?php echo $array[$i]->prijs ?></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="container col-sm-8">
                        <h2>Reviews and ratings!</h2>
                        <?php
                        if (false) {
                            ?>
                            <div class="form-group">
                                <label for="rating">Rating:</label>
                                <label class="radio-inline"><input type="radio" name="optradio">1</label>
                                <label class="radio-inline"><input type="radio" name="optradio">2</label>
                                <label class="radio-inline"><input type="radio" name="optradio">3</label>
                                <label class="radio-inline"><input type="radio" name="optradio">4</label>
                                <label class="radio-inline"><input type="radio" name="optradio">5</label>
                            </div>
                            <div class="form-group">
                                <label for="comment">Comment:</label>
                                <textarea class="form-control" rows="5" id="comment"></textarea>
                            </div>
                            <?php
                        } else {
                            ?>
                            <h4><a href="../login.php" class="links">Log in</a> to rate and review this product!</h4>
                            <?php
                        }
                        ?>
                        <?php
                        $arrReviewAndRating = ReviewAndRatingController::getReviewAndRatingByProductId($product->id);
                        for ($i = 0; $i < count($arrReviewAndRating); $i++) {
                            $person = PersonController::getPersonById($arrReviewAndRating[$i]->personId);
                            ?>
                            <br>
                            <table class="table-bordered table-review">
                                <tr>
                                    <td colspan="2"><?php echo $person->firstname . ' ' . $person->name; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><?php echo $arrReviewAndRating[$i]->rating; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><?php echo $arrReviewAndRating[$i]->review; ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $arrReviewAndRating[$i]->creationDate; ?></td>
                                    <td><?php echo $arrReviewAndRating[$i]->creationTime; ?></td>
                                </tr>
                            </table>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <br><br>

            </div>
        </div>
    </div>
    <?php
}
?>

<?php
include_once './footer.php';
?>

