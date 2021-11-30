<?php

class AdminMemberDB extends DB
{
    public function getAll()
    {
        $array = "SELECT id, full_name, phone_number, email, `address`, accept FROM `accounts` WHERE `role` = 'MEM';";
        $array = mysqli_query($this->connect, $array);
        $result = [];
        while ($s = mysqli_fetch_array($array, MYSQLI_ASSOC)) {
            array_push($result, $s);
        }
        if ($result)
            return $result;
        else return [];
    }
    function getbyID($id)
    {
        $array1 = "SELECT * FROM `product` WHERE id = " . $id . ";";
        $array2 = "SELECT image FROM `product_image` WHERE product_id = " . $id . ";";
        $array1 = mysqli_query($this->connect, $array1);
        $array2 = mysqli_query($this->connect, $array2);
        $result = [];
        while ($s = mysqli_fetch_array($array1, MYSQLI_ASSOC)) {
            array_push($result, $s);
        }
        while ($s = mysqli_fetch_array($array2, MYSQLI_ASSOC)) {
            array_push($result, $s);
        }
        if ($result)
            return $result;
        else return [];
    }
    function getItem($id)
    {
        $array = "SELECT `name`,`price`,`quantity`,`thumnail` FROM `product` WHERE id = " . $id . ";";
        $array = mysqli_query($this->connect, $array);
        $result = [];
        while ($s = mysqli_fetch_array($array, MYSQLI_ASSOC)) {
            array_push($result, $s);
        }
        if ($result)
            return $result;
        else return [];
    }

    function deleteById($id) {
        $sql = "DELETE FROM product WHERE id = '$id'";
        $res = $this->connect->query($sql);
        return $res;
    }
}
