<?php

class OrderDB extends DB{
    # thêm 1 hóa đơn mới vào csdl
    function AddOrder($type){
        $id = rand(0,1000000000);
        $cost = $_SESSION['pay'];
        $idcus = $_SESSION['id'];
        $query="INSERT INTO `orders` VALUES($id,'Đang xử lý','$type',NOW(),$cost,'$idcus');";
        mysqli_query($this->connect, $query);
        foreach ($_SESSION['Cart'] as $key => $value){
            $quantity = $value['choose'];
            $values = $value['price'];
            $query="INSERT INTO `belong` VALUES($id,$key,$quantity,$values);";
            mysqli_query($this->connect, $query);
        }
            unset($_SESSION["Cart"]);
            unset($_SESSION["pay"]);
    }

    # khách láy hóa đơn 
    function getOrderbyId(){
        $idcus = $_SESSION['id'];
        $array = "SELECT * FROM `orders` WHERE `member_id` = '$idcus';";
        $array = mysqli_query($this->connect,$array);
        $result=[];
        while($s = mysqli_fetch_array($array, MYSQLI_ASSOC)){
            array_push($result,$s);
        }
        return $result;
    }
    # khách láy chi tiết hóa đơn 
    function getOrderDetailbyId($OrderId){
        $array = "SELECT `belong`.*,`product`.`name`,`product`.`thumnail`
         FROM `belong`,`product` WHERE `order_id` = $OrderId AND `product_id`= `id`;";
        $array = mysqli_query($this->connect,$array);
        $result=[];
        while($s = mysqli_fetch_array($array, MYSQLI_ASSOC)){
            array_push($result,$s);
        }
        return $result;
    }
    # hủy đơn
    function cancelOrder($OrderId){
        $array = "UPDATE `orders` SET `status`='Đã Hủy' WHERE `id`= $OrderId;";
        $array = mysqli_query($this->connect,$array);
    }
}
?>