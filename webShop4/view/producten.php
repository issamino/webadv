<?php
include_once "../helper/init.php";
include_once "../controller/ProductController.php";
include_once "../controller/CategoryController.php";
include_once './header.php';
?>


<div class="container">
    <select onchange="veranderCategory(this.value)">
        <option class="cursorPointer" value="0" selected=" "> </option>
        <?php
        $array = CategoryController::getAllCategories();
        for ($i = 0; $i < count($array); $i++) {
            if (isset($_GET['categoryId']) && $_GET['categoryId'] !== null && $_GET['categoryId'] !== '') {
                ?>
                <option class="cursorPointer" value="<?php echo $array[$i]->id; ?>" selected=""><?php echo $array[$i]->name; ?></option>
                <?php
            } else {
                ?>
                <option class="cursorPointer" value="<?php echo $array[$i]->id; ?>"><?php echo $array[$i]->name; ?></option>
                <?php
            }
        }
        ?>
    </select>
    <br/>
    <div class="row">
        <?php
        $page = 0;
        $_SESSION['page'] = $page;
        $numberPerPage = 4;
        $offset = +$numberPerPage * +$page;
        $array = ProductController::getAllProducts(null, $numberPerPage, $offset);
        for ($i = 0; $i < count($array); $i++) {
            ?>
            <div class="col-sm-3">
                <div class="panel panel-primary ">
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
    <button onclick="laadMeerFunction()">Laad meer</button>
</div>
<br>
<script>


    function veranderCategory(id) {
        $.ajax({
            type: "GET",
            url: "../controller/HelperController.php",
            data: {productsByCategory: 1, id: id},
            success: function (data) {
                $(".row").html(data);

            }, error: function () {

            }
        });
    }
</script>

<?php
include_once './footer.php';
?>
