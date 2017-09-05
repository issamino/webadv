<?php

include_once "../helper/init.php";
include_once ("../DAO/AddressDao.php");
include_once ("../model/Address.php");

class AddressController {

    public static function addBillingAddress($address) {
        $id = AddressDao::addAddress($address);
        $_SESSION['billingAddress'] = $id;
        return $id;
    }

    public static function addDeliveryAddress($address) {
        $id = AddressDao::addAddress($address);
        $_SESSION['deliveryAddress'] = $id;
        return $id;
    }
/*
    public static function addAddressDeliveryAndAddressZijnHetZelfde($adres) {
        $id = AdresDao::addAdres($adres);
        $_SESSION['factuurAdres'] = $id;
        $_SESSION['leverAdres'] = $id;
        return $id;
    }
*/
    public static function getBillingAddress($id) {
        return AddressDao::getAddress($id);
    }

    public static function getDeliveryAdres($id) {
        return AddressDao::getAddress($id);
    }

}

?>
