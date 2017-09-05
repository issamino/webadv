<?php

if (isset($_POST['email']) && isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (filter_var("some@address.com", FILTER_VALIDATE_EMAIL)) {
        include_once ("../controller/PersoonController.php");
        PersoonController::login($email, $password);
        echo true;
    } else {
        echo false;
    }
}


