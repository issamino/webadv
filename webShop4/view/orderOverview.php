<?php
include_once "../helper/init.php";
include_once "../controller/ProductController.php";
include_once "../controller/AddressController.php";
$formError = "";
if (isset($_POST['orderFinished'])) {
    $orderFinished = $_POST['orderFinished'];
    if ($orderFinished !== "") {
        if (isset($_SESSION['deliveryMethod']) && isset($_SESSION['paymentMethod']) && isset($_SESSION['billingAddress']) && isset($_SESSION['deliveryAddress'])) {
            $array = $_SESSION['cart'];
            if (count($array) > 0) {
                include_once ("../controller/OrderController.php");
                $res = OrderController::addOrder();
                if ($res !== TRUE) {
                    $formError = $res;
                } else {
                    header("Location: ./OrderConfirmation.php");
                }
            } else {
                $formError = "You have to add at least one product!";
            }
        } else {
            $formError = "you have to add one deliverymethod, paymentmethod, billingaddress and deliveryaddress!";
        }
    } else {
        $formError = "Error!";
    }
}
include_once './header.php';
?>
<?php
if (!isset($_SESSION['account'])) {
    ?>
    You don't have access! 
    <?php
} else {
    if (isset($_SESSION['admin']) && $_SESSION['admin'] === '1') {
        ?>
        You don't have access! 
        <?php
    } else {
        ?>
        <div class="container">
            <div class="row">
                <?php
                if ($formError !== "") {
                    echo '<span class="formError">' . $formError . '</span>';
                }
                ?>
                <h3>Producten</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product name</th>
                            <th>Price per piece</th>
                            <th>Count</th>
                            <th>Sub total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['cart'])) {
                            $total = 0;
                            $arr = $_SESSION['cart'];
                            foreach ($arr as $key => $data) {
                                $product = ProductController::getProductById($key);
                                $subTotal = +($product->price) * +($data);
                                echo '<tr id="row' . $key . '"><td>' . $key . '</td><td>' . $product->name . '</td><td>' . $product->price . '</td><td><span id="c' . $key . '">' . $data . '</span></td><td>' . $subTotal . '</td></tr>';
                                $total += +($subTotal);
                            }
                            echo '<tr><td class="invisibleBottomAndLeftTableBorders" colspan="4"></td><td>' . $total . '</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                echo '<br/>';
                echo '<h3>Delivery method</h3>';
                if (isset($_SESSION['deliveryMethod'])) {
                    echo '' . $_SESSION['deliveryMethod'];
                } else {
                    echo '<a href="./deliveryMethod.php">add delivery method</a>';
                } echo '<br/>';
                echo '<h3>Payment method</h3>';
                if (isset($_SESSION['paymentMethod'])) {
                    echo '' . $_SESSION['paymentMethod'];
                } else {
                    echo '<a href="./paymentMethod.php">add paymentMethod</a>';
                }
                echo '<br/>';
                echo '<h3>Billing address</h3>';
                if (isset($_SESSION['billingAddress'])) {
                    $billingAddress = AddressController::getBillingAddress($_SESSION['billingAddress']);
                    echo 'Id: ' . $billingAddress->id . '<br/>';
                    echo 'Street: ' . $billingAddress->street . '<br/>';
                    echo 'Housnumber: : ' . $billingAddress->housenumber . '<br/>';
                    echo 'City: ' . $billingAddress->city . '<br/>';
                    echo 'Zipcode: ' . $billingAddress->zipcode . '<br/>';
                    echo 'Country: ' . $billingAddress->country . '<br/>';
                } else {
                    echo '<a href="./billingAddress.php">add billing address</a>';
                }
                echo '<br/>';
                echo '<h3>Delivery address</h3>';
                if (isset($_SESSION['deliveryAddress'])) {
                    $deliveryAddress = AddressController::getDeliveryAdres($_SESSION['deliveryAddress']);
                    echo 'Id: ' . $deliveryAddress->id . '<br/>';
                    echo 'Street: ' . $deliveryAddress->street . '<br/>';
                    echo 'Housenumber: : ' . $deliveryAddress->housenumber . '<br/>';
                    echo 'City: ' . $deliveryAddress->city . '<br/>';
                    echo 'Zipcode: ' . $deliveryAddress->zipcode . '<br/>';
                    echo 'Country: ' . $deliveryAddress->country . '<br/>';
                } else {
                    echo '<a href="./deliveryAddress.php">add delivery address</a>';
                }
                ?>
                <br/>
                <form action="" method="post">
                    <input type="button" onclick="javascript:history.go(-1)" class="btn btn-default" value="Back">
                    <input type="submit" class="btn btn-default" name="orderFinished" value="Finish order">
                </form>
            </div>
        </div>
        <?php
    }
}
?>
<br>
<?php
include_once './footer.php';
?>

