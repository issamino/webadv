<?php

include_once("Database.php");
include_once("../model/OrderDetail.php");

class OrderDetailDao {

    public static function getOrderDetailByOrderId($id) {
        $sql = 'SELECT * FROM BesteldeProduct WHERE bestellingId=' . $id;

        $arrayOrderDetails = array();
        $result = database::getConnection()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $orderDetail = new OrderDetail();
                $orderDetail->id = $row['id'];
                $orderDetail->orderId = $row['bestellingId'];
                $orderDetail->productId = $row['productId'];
                $orderDetail->count = $row['aantal'];
                array_push($arrayOrderDetails, $orderDetail);
            }
        }
        return $arrayOrderDetails;
    }

    public static function addOrderDetails($orderId, $productId, $count) {
        try {
            $sql = 'INSERT INTO BesteldeProduct(bestellingId, productId, aantal) VALUES("'
                    . $orderId . '", "' . $productId . '", "' . $count . '")';
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
