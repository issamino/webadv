<?php
include_once "../helper/init.php";
include_once "../controller/ProductController.php";
$formError = "";
if (isset($_POST['street']) && isset($_POST['housenumber']) && isset($_POST['zipcode']) && isset($_POST['city']) && isset($_POST['country'])) {
    $street = $_POST['street'];
    $housenumber = $_POST['housenumber'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    if (isset($_POST['DeliveryAddressIsSameAsBillingAddress'])) {
        $isDeliveryAddressTheSameAsBillingAddress = $_POST['DeliveryAddressIsSameAsBillingAddress'];
    } else {
        $isDeliveryAddressTheSameAsBillingAddress = 'no';
    }
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
                        if ($isDeliveryAddressTheSameAsBillingAddress === 'no') {
                            $res = AddressController::addBillingAddress($address);
                            header("Location: ./deliveryAddress.php");
                        } else {
                            $res = AddressController::addBillingAddress($address);
                            $res = AddressController::addDeliveryAddress($address);
                            header("Location: ./deliveryMethod.php");
                        }
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
} else {
    $formError = "ERROR!";
}
include_once './header.php';
?>
<?php
if (!isset($_SESSION['account'])) {
    ?>
    You don't have accesss!
    <?php
} else {
    if (isset($_SESSION['admin']) && $_SESSION['admin'] === '1') {
        ?>
        You don't have accesss!
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
                    <div class="checkbox">
                        <label>
                            <input name="DeliveryAddressIsSameAsBillingAddress" type="checkbox">
                            Is delivery address the same as billing address
                        </label>
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

