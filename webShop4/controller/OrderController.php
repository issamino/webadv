<?php

include_once "../helper/init.php";
include_once "../dao/OrderDao.php";
include_once "../dao/OrderDetailDao.php";
include_once "../dao/AddressDao.php";

class OrderController {

    public static function getAllOrders() {
        return OrderDao::getAllOrders();
    }

    public static function getBestellingById($id) {
        return OrderDao::getOrderById($id);
    }

    public static function saveDeliveryMethod($deliveryMethod) {
        $_SESSION['deliveryMethod'] = $deliveryMethod;
        return true;
    }

    public static function savePaymentMethod($paymentMethod) {
        $_SESSION['paymentMethod'] = $paymentMethod;
        return true;
    }

    public static function saveTermsResponse($terms) {
        $_SESSION['terms'] = $terms;
        return true;
    }

    public static function addOrder() {
        $personId = $_SESSION['account'];
        $deliveryMethod = $_SESSION['deliveryMethod'];
        $paymentMethod = $_SESSION['paymentMethod'];
        $billingAddressId = $_SESSION['billingAddress'];
        $deliveryAddressId = $_SESSION['deliveryAddress'];
        $OrderId = OrderDao::addOrder($personId, $deliveryMethod, $paymentMethod, $billingAddressId, $deliveryAddressId);

        $cartArray = $_SESSION['cart'];
        foreach ($cartArray as $key => $data) {
            OrderDetailDao::addOrderDetails($OrderId, $key, $data);
        }
        return true;
    }

}
?>

