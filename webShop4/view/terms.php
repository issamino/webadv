<?php
include_once "../helper/init.php";
$errorForm = "";
if (isset($_POST['terms'])) {
    $terms = $_POST['terms'];
    if ($terms !== "") {
        include_once ("../controller/OrderController.php");
        $res = OrderController::saveTermsResponse($terms);
        if ($res !== TRUE) {
            $errorForm = $res;
        } else {
            header("Location: ./OrderOverview.php");
        }
    } else {
        $errorForm = "Terms can not be empty!";
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
    if (isset($_SESSION['admin']) && ($_SESSION['admin'] === 1 || $_SESSION['admin'] === '1')) {
        ?>
        Je hebt geen toegang tot deze pagina!
        <?php
    } else {
        ?>
        <div class="container">
            <div class="row">
                <?php
                if ($errorForm !== "") {
                    echo '' . $errorForm;
                }
                ?>
                <form action="" method="post">
                    <div class="radio">
                        <label><input type="radio" name="terms" required>You have to accespt the terms!</label>
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
