<?php
include_once "../helper/init.php";
include_once "../controller/ProductController.php";
unset($_SESSION['account']);
unset($_SESSION['admin']);
include_once './header.php';
?>
<div class="container">
    <div class="row">
        You are logged out!
    </div>
</div>
<br><br>
<?php
include_once './footer.php';
?>

