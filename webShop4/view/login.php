<?php
include_once "../helper/init.php";
include_once "../controller/ProductController.php";
$formError = "";
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email !== "") {
        if ($password !== "") {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                include_once ("../controller/PersonController.php");
                $res = PersonController::login($email, $password);
                if ($res !== "success") {
                    $formError = $res;
                } else {
                    header("Location: ./index.php");
                }
            } else {
                $formError = "Email is not valid!";
            }
        } else {
            $formError = "Password can not be empty!";
        }
    } else {
        $formError = "Email can not be empty!";
    }
}
include_once './header.php';
?>
<div class="container">
    <div class="row">
        <?php
        if (isset($_SESSION['account'])) {
            ?>
            You don't have access!
            <?php
        } else {
            if ($formError !== "") {
                echo '<span class="formError">' . $formError . '</span>';
            }
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input name="email" type="email" class="form-control" id="email" required>
                </div>           
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input name="password" type="password" class="form-control" id="password" required>
                </div>                
                <input type="submit" class="btn btn-default">
            </form>
            <?php
        }
        ?>
    </div>
</div>
<br>
<?php
include_once './footer.php';
?>


