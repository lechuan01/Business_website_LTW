<?php

class DishDB extends DB{
    function getDish($id){
        $array = "select * from cart where IDUSERS ==".$id;
        $array = mysqli_query($this->connect,$array);
        return json_encode($array);
    }
    function getDB(){
        $array = "SELECT * FROM DISH;";
        $array = mysqli_query($this->connect,$array);
        $result=[];
        while($s = mysqli_fetch_array($array, MYSQLI_ASSOC)){
            array_push($result,[
                'Id'=>$s["IDDISH"],
                'Name'=>$s["DISHNAME"],
                'Price'=>$s["PRICE"],
                'Descrip'=>$s["DESCRIP"],
                'Type'=>$s["TYPEDISH"],
                'Picture'=>$s["PICTURE"]]
            );
        }
        return $result;
    }
}
?>