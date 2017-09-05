<?php
include_once "../helper/init.php";
include_once "../controller/ProductController.php";
$formError = "";
if (isset($_POST['street']) && isset($_POST['housenumber']) && isset($_POST['zipcode']) && isset($_POST['city']) && isset($_POST['country'])) {
    $street = $_POST['street'];
    $housenumber = $_POST['housnumber'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $country = $_POST['country'];

    if ($street !== "") {
        if ($housenumber !== "") {
            if ($city !== "") {
                if ($zipcode !== "") {
                    if ($country !== "") {
                        include_once ("../controller/AddressController.php");
                        $address = new Address();
                        $address->street = $street;
                        $address->housenumber = $housenumber;
                        $address->zipcode = $zipcode;
                        $address->city = $city;
                        $address->country = $country;
                        $res = AddressController::addDeliveryAddress($address);
                        header("Location: ./deliveryMethod.php");
                    } else {
                        $formError = "Country is not valid!";
                    }
                } else {
                    $formError = "City is not valid!";
                }
            } else {
                $formError = "Zipcode is not valid!";
            }
        } else {
            $formError = "Housenumber can not be empty!";
        }
    } else {
        $formError = "Street can not be empty!";
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
                <form action="" method="post">
                    <div class="form-group">
                        <label for="street">Street:</label>
                        <input name="street" type="text" class="form-control" id="street" required>
                    </div>           
                    <div class="form-group">
                        <label for="housenumber">Housenumber:</label>
                        <input name="housenumber" type="text" class="form-control" id="housenumber" required>
                    </div>  
                    <div class="form-group">
                        <label for="zipcode">Zipcode:</label>
                        <input name="zipcode" type="text" class="form-control" id="ziptcode" required>
                    </div>  
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input name="city" type="text" class="form-control" id="city" required>
                    </div>  
                    <div class="form-group">
                        <label for="country">Country:</label>
                        <input name="country" type="text" class="form-control" id="country" required>
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


