<?php

include_once "../helper/init.php";
include_once "../dao/OrderDetailDao.php";

class OrderDetailController {

    public static function getOrderDetailByOrderId($id) {
        return OrderDetailDao::getOrderDetailByOrderId($id);
    }

}
?>
