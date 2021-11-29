<?php

class ReviewDB extends DB{
    public function Getreview($id)
    {
        $qr = "SELECT A.*,B.`full_name` FROM `review` AS A,`accounts` AS B WHERE `product_id`= $id AND A.`member_id`=B.`id`; ";
        $result = mysqli_query($this->connect, $qr);
        $array=[];
        while($s = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            array_push($array,$s);
        }
        return $array;
    }
    public function addReview($id,$content)
    {
        $idcus = $_SESSION['id'];
        $mark = rand(0,1000000000);
        $qr = "INSERT INTO `review` VALUES($id,$mark,'$content','$idcus');";
        echo  $qr;
        $result = mysqli_query($this->connect, $qr);
        return $result;
    }
}

?>