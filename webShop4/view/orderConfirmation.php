<?php
include_once "../helper/init.php";
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
                <h3>Je hebt besteld!</h3>
            </div>
        </div>
        <br>
        <?php
    }
}
?>
<?php
include_once './footer.php';
?>



