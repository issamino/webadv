<?php

class OrderDetail {

    public $id;
    public $orderId;
    public $productId;
    public $count;

    public function _Construct($id, $orderId, $productId, $count) {
        $this->id = $id;
        $this->orderId = $orderId;
        $this->productId = $productId;
        $this->count = $count;
    }

}
