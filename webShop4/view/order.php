<?php
include_once "../helper/init.php";
include_once "../controller/BestellingController.php";
include_once "../controller/OrderDetailController.php";
include_once "../controller/ProductController.php";
include_once "../controller/PersoonController.php";
include_once "../controller/AdresController.php";
include_once "../model/Order.php";
include_once "../model/OrderDetail.php";
include_once "../model/Product.php";
include_once "../model/Persoon.php";
include_once "../model/Adres.php";
include_once './header.php';
?>
<?php
if (isset($_SESSION['admin']) && ($_SESSION['admin'] === 0 || $_SESSION['admin'] === '0')) {
    ?>
    Je hebt geen toegang tot deze pagina!
    <?php
} else {
    ?>

    <div class="container-fluid text-center">    
        <div class="row content">
            <div class="col-sm-2 sidenav">
            </div>
            <div class="col-sm-8 text-left"> 
                <?php
                $id = $_GET['id'];
                $bestelling = BestellingController::getBestellingById($id);
                $bestellingDetails = OrderDetailController::getOrderDetailByOrderId($id);
                $persoon = PersoonController::getPersoonById($bestelling->personId);
                $factuurAdres = AdresController::getFactuurAdres($bestelling->billingAddressId);
                $leverAdres = AdresController::getLeverAdres($bestelling->deliveryAddressId);
                ?>
                <h1>Bestelling</h1><br/>
                <label>Lever methode: </label><?php echo $bestelling->deliveryMethod; ?><br/>
                <label>Betaal methode: </label><?php echo $bestelling->paymentMethod; ?><br/>
                <h3>Bestelde producten</h3><br/>
                <?php
                for ($i = 0; $i < count($bestellingDetails); $i++) {
                    $product = ProductController::getProductById($bestellingDetails[$i]->productId);
                    ?>
                    <label>Naam: </label><?php echo $product->naam; ?><br/>
                    <img src="<?php echo $product->foto; ?>" class="img-responsive imgProdutDetail" alt="Image"/>
                    <label>Prijs: </label><?php echo $product->prijs; ?><br/>
                    <label>Beschrijving: </label><?php echo $product->beschrijving; ?><br/>
                    <label>Aantal: </label><?php echo $bestellingDetails[$i]->aantal; ?><br/><br/>
                <?php }
                ?>    
                <h1>Persoon</h1><br/>
                <label>Naam: </label><?php echo $persoon->naam; ?><br/>
                <label>Voornaam: </label><?php echo $persoon->voornaam; ?><br/>
                <label>Email: </label><?php echo $persoon->email; ?><br/>

                <h1>Factuur adres</h1><br/>
                <label>Straat: </label><?php echo $factuurAdres->straat; ?><br/>
                <label>Huisnummer: </label><?php echo $factuurAdres->huisnummer; ?><br/>
                <label>Gemeente: </label><?php echo $factuurAdres->gemeente; ?><br/>
                <label>Postcode: </label><?php echo $factuurAdres->postcode; ?><br/>
                <label>Land: </label><?php echo $factuurAdres->land; ?><br/>

                <h1>Lever adres</h1><br/>
                <label>Straat: </label><?php echo $leverAdres->straat; ?><br/>
                <label>Huisnummer: </label><?php echo $leverAdres->huisnummer; ?><br/>
                <label>Gemeente: </label><?php echo $leverAdres->gemeente; ?><br/>
                <label>Postcode: </label><?php echo $leverAdres->postcode; ?><br/>
                <label>Land: </label><?php echo $leverAdres->land; ?><br/>

            </div>
        </div>
        <?php
    }
    include_once './footer.php';
    ?>

