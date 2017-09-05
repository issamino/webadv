<?php
include_once "../helper/init.php";
$formError = "";
if (isset($_POST['deliveryMethod'])) {
    $deliveryMethod = $_POST['deliveryMethod'];
    if ($deliveryMethod !== "") {
        include_once ("../controller/OrderController.php");
        $res = OrderController::saveDeliveryMethod($deliveryMethod);
        if ($res !== TRUE) {
            $formError = $res;
        } else {
            header("Location: ./paymentMethod.php");
        }
    } else {
        $formError = "you have to choose one!";
    }
}
include_once './header.php';
?>
<?php
if (!isset($_SESSION['account'])) {
    ?>
    Je hebt geen toegang tot deze pagina!
    <?php
} else {
    if (isset($_SESSION['admin']) && $_SESSION['admin'] === '1') {
        ?>
        Je hebt geen toegang tot deze pagina!
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
                <form action="" method="post">
                    <div class="radio">
                        <label><input type="radio" name="deliveryMethod" value="BPost">BPost</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="deliveryMethod" value="DHL">DHL</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="deliveryMethod" value="FedEx">FedEx</label>
                    </div>
                    <input type="button" onclick="javascript:history.go(-1)" class="btn btn-default" value="Back">
                    <input type="submit" class="btn btn-default" value="Next">
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

