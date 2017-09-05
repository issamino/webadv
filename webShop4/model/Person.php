<?php


class Person {

    public $id;
    public $name;
    public $firstname;
    public $email;
    public $password;
    public $admin;

    public function _Construct($id, $name, $firstname, $email, $password, $admin) {
        $this->id = $id;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->password = $password;
        $this->admin = $admin;
    }

}

