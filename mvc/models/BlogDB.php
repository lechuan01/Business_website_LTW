<?php

class BlogDB extends DB{
    
    function getAll(){
        $array = "SELECT * FROM `blog`;";
        $array = mysqli_query($this->connect,$array);
        $result=[];
        while($s = mysqli_fetch_array($array, MYSQLI_ASSOC)){
            array_push($result,$s);
        }
        if ($result) 
            return $result;
        else
        return [];
    }
    
}

?>