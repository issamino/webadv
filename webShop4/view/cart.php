<?php
include_once "../helper/init.php";
include_once "../controller/ProductController.php";
include_once './header.php';
?>
<div class="container">
    <div class="row">
        <?php
        if (isset($_SESSION['admin']) && ($_SESSION['admin'] === 1 || $_SESSION['admin'] === '1')) {
            ?>
            You don't have access!
            <?php
        } else {
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product name</th>
                        <th>Count</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $arr = $_SESSION['cart'];
                        foreach ($arr as $key => $data) {
                            $product = ProductController::getProductById($key);
                            echo '<tr id="row' . $key . '"><td>' . $key . '</td><td>' . $product->name .
                            '</td><td><span class="glyphicon glyphicon-minus cursorPointer" onclick="minusCount('
                            . $key . ')"></span><span id="c' . $key . '">' . $data .
                            '</span><span class="glyphicon glyphicon-plus cursorPointer" onclick="plusCount(' . $key
                            . ')"></span></td><td><span onclick="removeFromCart(' . $key .
                            ')" class="glyphicon glyphicon-trash cursorPointer"></span></td></tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
            <?php
            if (!isset($_SESSION['cart'])) {
                echo '<div id="nothingInCart" >nothing in cart</div>';
            }
            ?>
            <br/>
            <?php
            if (isset($_SESSION['account'])) {
                ?>
            <form action="./billingAddress.php">
                    <button type="submit" class="btn btn-primary">Next</button>
                </form>
            <?php } else {
                ?>
                <a href="./login.php">Log in</a> to order!<br/>
                <?php
            }
        }
        ?>
    </div>
</div>
<br>
<?php
include_once './footer.php';
?>

