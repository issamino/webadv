<?php
include_once "../helper/init.php";
$formError = "";
if (isset($_POST['paymentMethod'])) {
    $paymentMethod = $_POST['paymentMethod'];
    if ($paymentMethod !== "") {
        include_once ("../controller/OrderController.php");
        $res = OrderController::savePaymentMethod($paymentMethod);
        if ($res !== TRUE) {
            $formError = $res;
        } else {
            header("Location: ./terms.php");
        }
    } else {
        $formError = "Payment method can not be empty!";
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
                        <label><input type="radio" name="paymentMethod" value="paypal">Paypal</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="paymentMethod" value="maestro">Maestro</label>
                    </div>  
                    <div class="radio">
                        <label><input type="radio" name="paymentMethod" value="visa">VISA</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="paymentMethod" value="mastercard">Mastercard</label>
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

