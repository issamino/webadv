<?php

include_once("Database.php");
include_once("../model/Order.php");
include_once("../model/Address.php");

class OrderDao {

    public static function getAllOrders() {
        $sql = 'SELECT * FROM Bestelling';
        $arrayOrder = array();
        $result = database::getConnection()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $order = new Order();
                $order->id = $row['id'];
                $order->personId = $row['persoonId'];
                $order->deliveryMethod = $row['leverMethode'];
                $order->paymentMethod = $row['betaalMethode'];
                $order->billingAddressId = $row['factuurAdresId'];
                $order->deliveryAddressId = $row['leverAdresId'];
                array_push($arrayOrder, $order);
            }
        }
        return $arrayOrder;
    }

    public static function getOrderById($id) {
        $sql = 'SELECT * FROM Bestelling WHERE id=' . $id;
        $result = database::getConnection()->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $order = new Order();
            $order->id = $row['id'];
            $order->personId = $row['persoonId'];
            $order->deliveryMethod = $row['leverMethode'];
            $order->paymentMethod = $row['betaalMethode'];
            $order->billingAddressId = $row['factuurAdresId'];
            $order->deliveryAddressId = $row['leverAdresId'];
        }
        return $order;
    }

    public static function addOrder($personId, $deliveryMethod, $paymentMethod, $billingAddressId, $deliveryAddressId) {
        try {
            $co = database::getConnection();
            $sql = 'INSERT INTO Bestelling(persoonId, leverMethode, betaalMethode, factuurAdresId, leverAdresId) VALUES("'
                    . $personId . '", "' . $deliveryMethod . '", "' . $paymentMethod . '", "'
                    . $billingAddressId . '", "' . $deliveryAddressId . '")';
            if ($co->connect_error) {
                die("Connection failed: " . $co->connect_error);
            }
            $result = $co->query($sql);
        } catch (Exception $e) {
            return false;
        }
        return mysqli_insert_id($co);
    }

  

}
