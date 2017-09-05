<?php

include_once ("../dao/PersonDao.php");

class PersonController {

    public static function getPersonById($id) {
        return PersonDao::getPersonById($id);
    }

    public static function login($email, $password) {
        $person = PersonDao::login($email, $password);
        if ($person !== null) {
            if ($person->password === sha1($password)) {
                $_SESSION['account'] = $person->id;
                $_SESSION['admin'] = $person->admin;
                return "success";
            }
        }
        return "Email or password is not valid!";
    }

    public static function registration($person) {
        $result = PersonDao::registration($person);
        if ($result > 0) {
            return "success";
        } else {
            return "Error!";
        }
    }

}
?>

