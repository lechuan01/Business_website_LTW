<?php

class OrderDB extends DB{
    private 
    # lấy dữ liệu để in hóa đơn thanh toán 
    function getPayment($id){
        $array = "SELECT IDCART,QUANTITY,cart.PRICE,TOTALPRICE,SDT,NAMECUST,DISHNAME FROM cart INNER JOIN dish ON cart.IDDISH=dish.IDDISH WHERE IDCART='$id';";
        $array = mysqli_query($this->connect,$array);
        $result=[];
        while($s = mysqli_fetch_array($array, MYSQLI_ASSOC)){
            array_push($result,$s);
        }
        return $result;
    }
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

    # lấy tất cả hóa đơn từ csdl
    function showReceiptDB(){
        $array = "SELECT DISTINCT PAYMENT.IDPAY, PAYMENT.IDCART,PAYMENT.TOTALPRICE,SDT,NAMECUST,PAYTIME FROM CART INNER JOIN PAYMENT ON CART.IDCART=PAYMENT.IDCART;";
        $array = mysqli_query($this->connect,$array);
        $result=[];
        while($s = mysqli_fetch_array($array, MYSQLI_ASSOC)){
            array_push($result,$s);
        }
        return $result;
    }
}
?>