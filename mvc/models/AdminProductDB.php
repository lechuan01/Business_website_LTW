<?php

class AdminProductDB extends DB
{
    public function getAll()
    {
        $array = "SELECT * FROM `product`;";
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
    function insert($name, $specs, $price, $qty, $category, $thumnail, $product_image)
    {
        // console_log($product_image);
        $check = true;
        $sql1 = "insert into product (price, specs, name, category, quantity, thumnail) values ('$price', '$specs', '$name', '$category', '$qty', '$thumnail');";
        $res1 = $this->connect->query($sql1);
        if ($res1) {
            for ($i = 0; $i < count($product_image); $i++) {
                $sql2 = "INSERT INTO `product_image` (product_id, image) VALUES ((SELECT max(id) FROM product), '$product_image[$i]');";
                $this->connect->query($sql2);
            }
        }
        return $check;
    }

    function deleteById($id) {
        $sql = "DELETE FROM product WHERE id = '$id'";
        $res = $this->connect->query($sql);
        return $res;
    }
}
