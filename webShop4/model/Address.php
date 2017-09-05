<?php

class Address {

    public $id;
    public $street;
    public $housenumber;
    public $zipcode;
    public $city;
    public $country;

    public function _Construct($id, $street, $housenumber, $zipcode, $city, $country) {
        $this->id = $id;
        $this->street = $street;
        $this->housenumber = $housenumber;
        $this->zipcode = $zipcode;
        $this->city = $city;
        $this->country = $country;
    }

}
