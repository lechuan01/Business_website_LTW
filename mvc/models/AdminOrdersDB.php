<?php

class AdminOrdersDB extends DB
{
    public function getAll()
    {
        $array ="SELECT `orders`.id as id,`accounts`.phone_number as phone, orders.status as stt,`orders`.payment_type as pay,`orders`.cost as cost,`orders`.create_date as create_date
        FROM `orders`
        JOIN `accounts` ON `orders`.member_id = `accounts`.id;";
        $array = mysqli_query($this->connect, $array);
        $result = [];
        while ($s = mysqli_fetch_array($array, MYSQLI_ASSOC)) {
            array_push($result, $s);
        }
        if ($result)
            return $result;
        else return [];
    }
    function get_item_byID($id)
    {
        $array1 = "SELECT product_id, quantity,price FROM `belong` WHERE order_id = " . $id . ";";
        $array1 = mysqli_query($this->connect, $array1);
        $result = [];
        while ($s = mysqli_fetch_array($array1, MYSQLI_ASSOC)) {
            array_push($result, $s);
        }
        if ($result)
            return $result;
        else return [];
    }
}