<?php

class Order {

    public $id;
    public $personId;
    public $deliveryMethod;
    public $paymentMethod;
    public $billingAddressId;
    public $deliveryAddressId;

    public function _Construct($id, $personId, $deliveryMethod, $paymentMethod, $billingAddressId, $deliveryAddressId) {
        $this->id = $id;
        $this->personId = $personId;
        $this->deliveryMethod = $deliveryMethod;
        $this->paymentMethod = $paymentMethod;
        $this->billingAddressId = $billingAddressId;
        $this->deliveryAddressId = $deliveryAddressId;
    }

}

