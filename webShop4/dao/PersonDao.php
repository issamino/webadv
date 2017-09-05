<?php

include_once("database.php");
include_once("../model/Person.php");

class PersonDao {

    public static function getPersonById($id) {
        $sql = 'SELECT * FROM Persoon WHERE id = ' . $id;
        if (database::getConnection()->connect_error) {
            die("Connection failed: " . database::getConnection()->connect_error);
        }
        $result = database::getConnection()->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
            $person = new Person();
            $person->id = $row[0];
            $person->name = $row[1];
            $person->firstname = $row[2];
            $person->email = $row[3];
            $person->password = $row[4];
            $person->admin = $row[5];
            return $person;
        }
    }

    public static function login($email, $password) {
        $sql = 'SELECT * FROM Persoon WHERE email = "' . $email . '"';
        if (database::getConnection()->connect_error) {
            die("Connection failed: " . database::getConnection()->connect_error);
        }
        $result = database::getConnection()->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
            $person = new Person();
            $person->id = $row[0];
            $person->name = $row[1];
            $person->firstname = $row[2];
            $person->email = $row[3];
            $person->password = $row[4];
            $person->admin = $row[5];
            return $person;
        }
    }

    public static function registration($person) {
        try {
            $sql = 'INSERT INTO Persoon(naam, voornaam, email, wachtwoord, admin) VALUES("'
                    . $person->name . '", "' . $person->firstname . '", "' . $person->email . '", "'
                    . sha1($person->password) . '", ' . +($person->admin) . ');';
            if (database::getConnection()->connect_error) {
                die("Connection failed: " . database::getConnection()->connect_error);
            }
            $result = database::getConnection()->query($sql);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

}
?>






