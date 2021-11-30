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
        $array1 = "SELECT product.name, belong.quantity, belong.price
        FROM `belong`
        JOIN `product` ON product.id = belong.product_id
        WHERE belong.order_id =" . $id . ";";
        $array2 = "SELECT accounts.full_name,accounts.address,accounts.email
        FROM `accounts` JOIN `orders` ON accounts.id = orders.member_id
        WHERE orders.id =" . $id . ";";

        $array1 = mysqli_query($this->connect, $array1);
        $array2 = mysqli_query($this->connect, $array2);
        $result = [];
        while ($s = mysqli_fetch_array($array2, MYSQLI_ASSOC)) {
            array_push($result, $s);
        }
        while ($s = mysqli_fetch_array($array1, MYSQLI_ASSOC)) {
            array_push($result, $s);
        }
        
        if ($result)
            return $result;
        else return [];
    }
    function completeOrderbyid($id)
    {
        $sql = "UPDATE orders set orders.status =  'Đã hoàn thành' WHERE orders.id = $id;";
        $res = $this->connect->query($sql);
        return $res;
    }
}