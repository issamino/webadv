<?php
include_once "../helper/init.php";
include_once "../controller/ProductController.php";
include_once "../controller/CategoryController.php";
include_once "../model/Category.php";
include_once './header.php';
?>

<div class="container">
    <div class="row">
        <?php
        $array = ProductController::getHighlightedProducts();
        for ($i = 0; $i < count($array); $i++) {
            ?>
            <div class="col-sm-3">
                <div class="panel panel-primary">
                    <div class="panel-heading" >
                        <a href="./product.php?id=<?php echo $array[$i]->id; ?>">
                            <?php echo $array[$i]->name ?>
                        </a>
                    </div>
                    <div class="panel-body"><img src="<?php echo $array[$i]->image ?>" class="img-responsive prod-img"
                                                 style="width:100%" alt="Image">
                        <div class="ca" id="<?php echo 'u' . $array[$i]->id ?>"  onclick="<?php echo 'cartFunc(' . $array[$i]->id . ')' ?>"><span
                                class="glyphicon glyphicon-shopping-cart cart-in-img">
                            </span></div>
                    </div>
                    <?php
                    $category = CategoryController::getCategoryById($array[$i]->categoryId);
                    ?>
                    <div class="panel panel-default"> 
                        <a href="./product.php?id=<?php echo $array[$i]->id; ?>">
                            <div class="panel-body"> <?php echo $category->name ?></div>
                            <div class="panel-footer"> <?php echo $array[$i]->price ?></div>
                        </a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<br>

<div class="container">
    <div class="row">
        <?php
        $array = ProductController::getNewProducts();
        for ($i = 0; $i < count($array); $i++) {
            ?>
            <div class="col-sm-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <a href="./product.php?id=<?php echo $array[$i]->id; ?>">
                            <?php echo $array[$i]->name ?>
                        </a>
                    </div>
                    <div class="panel-body"><img src="<?php echo $array[$i]->image ?>" class="img-responsive prod-img"
                                                 style="width:100%" alt="Image">
                        <div class="ca" id="<?php echo 'n' . $array[$i]->id ?>"  onclick="<?php echo 'cartFunc(' . $array[$i]->id . ')' ?>"><span
                                class="glyphicon glyphicon-shopping-cart cart-in-img"></span></div>
                    </div>
                    <?php
                    $category = CategoryController::getCategoryById($array[$i]->categoryId);
                    ?>
                    <div class="panel panel-default"> 
                        <a href="./product.php?id=<?php echo $array[$i]->id; ?>">
                            <div class="panel-body"> <?php echo $category->name ?></div>
                            <div class="panel-footer"> <?php echo $array[$i]->price ?></div>
                        </a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<br><br>

<?php
include_once './footer.php';
?>

