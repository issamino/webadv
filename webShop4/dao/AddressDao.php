<?php

include_once("Database.php");
include_once("../model/Address.php");

class AddressDao {

    public static function addAddress($address) {
        try {
            $co = database::getConnection();
            $request = $co->query('INSERT INTO Adres(straat, huisnummer, postcode, gemeente, land) VALUES("'
                    . $address->street . '", "' . $address->housenumber . '", "'
                    . $address->zipcode . '", "' . $address->city . '", "' . $address->country . '")');
        } catch (Exception $e) {
            return false;
        }
        return mysqli_insert_id($co);
    }

    /*
      public static function getAddressByPersonId($id) {
      $request = database::getConnection()->prepare('SELECT * FROM Adres WHERE persoonId=?');
      $request->execute(array($id));

      $arrayList = $request->fetchAll();
      if (count($arrayList) !== 0) {
      $address = new Address();
      $address->id = $arrayList[0]['id'];
      $address->personId = $arrayList[0]['personId'];
      $address->street = $arrayList[0]['street'];
      $address->housenumber = $arrayList[0]['housenumber'];
      $address->city = $arrayList[0]['city'];
      $address->zipcode = $arrayList[0]['zipcode'];
      $address->country = $arrayList[0]['country'];
      $address->isBillingAddress= $arrayList[0]['isBillingAddress'];
      $address->isDeliveryAddress= $arrayList[0]['isDeliveryAddress'];
      return $address;
      }
      }
     */

    public static function getAddress($id) {
        $sql = 'SELECT * FROM Adres WHERE id = ' . $id;
        $result = database::getConnection()->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $address = new Address();
            $address->id = $row['id'];
            $address->street = $row['straat'];
            $address->housenumber = $row['huisnummer'];
            $address->city = $row['gemeente'];
            $address->zipcode = $row['postcode'];
            $address->country = $row['land'];
        }
        return $address;
    }

}

?>
