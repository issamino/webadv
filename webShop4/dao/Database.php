<?php

class database {

    private $db_connection = null;

    public static function getConnection() {
        $db_host = "dt5.ehb.be";
        $db_username = "WDA021";
        $db_password = "13749256";
        $db_database = "WDA021";

        try {
            $db_connection = mysqli_connect($db_host, $db_username, $db_password, $db_database);
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            if (mysqli_connect_errno()) {
                die("Database connection failed: " . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
            } else {
                //echo " verbinding gemaakt !!";
            }
        } catch (Exception $e) {
            echo " verbinding mislukt !!";
        }
        return $db_connection;
    }

    public static function endConnection() {
        //mysqli_close($db_connection);
    }

}

?>