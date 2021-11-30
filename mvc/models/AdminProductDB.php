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
        $sql1 = "insert into product (price, specs, name, category, quantity, thumnail) values ('$price', '$specs', '$name', '$category', '$qty', '$thumnail');";
        $res1 = $this->connect->query($sql1);
        if ($res1) {
            for ($i = 0; $i < count($product_image); $i++) {
                $sql2 = "INSERT INTO `product_image` (product_id, image) VALUES ((SELECT max(id) FROM product), '$product_image[$i]');";
                $res2 = $this->connect->query($sql2);
                if (!$res2) {
                    return mysqli_error($this->connect);
                }
            }
            return "true";
        }
        else {
            return mysqli_error($this->connect);
        }
    }
    function updateById($id, $name, $specs, $price, $qty, $category, $file_name, $image_array)
    {
        if ($file_name) {
            $sql = "UPDATE product SET price = '$price', specs = '$specs', `name` = '$name', category = '$category', quantity = '$qty', thumnail = '$file_name' where id = '$id'";
            $res = $this->connect->query($sql);
        } 
        
        else {
            $sql = "UPDATE product SET price = '$price', specs = '$specs', `name` = '$name', category = '$category', quantity = '$qty' where id = '$id'";
            $res = $this->connect->query($sql);
            if ($res) {
                if (count($image_array) > 0 && $image_array[0] != "") {
                    $sql3 = "SELECT `image` FROM product_image WHERE product_id = '$id'";
                    $curr = $this->connect->query($sql3);
                    $result = [];
                    while ($row = mysqli_fetch_array($curr, MYSQLI_TYPE_CHAR)) {
                        array_push($result, $row);
                    }
                    $Str = '';
                    for ($i = 0; $i < count($image_array); $i++) {
                        // console_log($result[$i]['image']);
                        $Str = $result[$i]['image'];
                        $sql2 = "UPDATE `product_image` SET `image` =  '$image_array[$i]' WHERE product_id = " . $id . " and `image` = '$Str'";
                        $res = $this->connect->query($sql2);
                    }
                }
            }
        }

        if ($res) {
            return "true";
        }
        return mysqli_error($this->connect);
    }
    function deleteById($id)
    {
        $sql = "DELETE FROM product WHERE id = '$id'";
        $res = $this->connect->query($sql);
        return $res;
    }
}
