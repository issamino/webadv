<?php
include_once './header.php';
include_once '../controller/BestellingController.php';
include_once '../controller/PersoonController.php';
?>
<div class="container">
    <div class="row">
        <?php
        if (isset($_SESSION['admin']) && ($_SESSION['admin'] === 0 || $_SESSION['admin'] === '0')) {
            ?>
            Je hebt geen toegang tot deze pagina!
            <?php
        } else {
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Person name</th>
                        <th>Delivery method</th>
                        <th>Payment method</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $arr = BestellingController::getAllBestellingen(null, 0);
                    for ($i = 0; $i < count($arr); $i++) {
                        $persoon = PersoonController::getPersoonById($arr[$i]->personId);
                        echo '<tr>'
                        . '<td>' . $arr[$i]->id . '</td>'
                        . '<td>' . $persoon->naam . '</td>'
                        . '<td>' . $arr[$i]->deliveryMethod . '</td>'
                        . '<td>' . $arr[$i]->paymentMethod . '</td>'
                        . '<td><a href="./order.php?id=' . $arr[$i]->id . '">Meer info<a></td>'
                        . '</tr>';
                    }
                    ?>
                </tbody>
            </table>
            <?php
        }
        ?>
    </div>
</div>
<br>
<?php
include_once './footer.php';
?>