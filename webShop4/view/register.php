<?php
include_once "../helper/init.php";
include_once "../model/Person.php";
include_once "../controller/ProductController.php";
$formError = "";
if (isset($_POST['firstname']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $firstname = $_POST['firstname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($firstname !== "") {
        if ($name !== "") {
            if ($email !== "") {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if ($password !== "") {
                        include_once ("../controller/PersonController.php");
                        $person = new Person();
                        $person->firstname = $firstname;
                        $person->name = $name;
                        $person->email = $email;
                        $person->password = $password;
                        $person->admin = false;
                        $res = PersonController::registration($person);
                        if ($res !== "success") {
                            $formError = $res;
                        } else if ($res === "success") {
                            $formError = "Account created!";
                        }
                    } else {
                        $formError = "Password can not be empty!";
                    }
                } else {
                    $formError = "Email is not valid!";
                }
            } else {
                $formError = "Email can not be empty!";
            }
        } else {
            $formError = "Name can not be empty!";
        }
    } else {
        $formError = "Firstname can not be empty!";
    }
}
include_once './header.php';
?>
<?php
if (isset($_SESSION['account'])) {
    ?>
    You can't access this page!
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
                    <label for="firstname">Firstname:</label>
                    <input name="firstname" type="firstname" class="form-control" id="firstname" required>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input name="name" type="naam" class="form-control" id="name" required>
                </div>
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
        </div>
    </div>
    <?php
}
?>
<br>
<?php
include_once './footer.php';
?>
