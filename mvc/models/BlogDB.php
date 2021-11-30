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
    function getById($id){
        $array = "SELECT * FROM `blog` WHERE title = '$id';";
        $array2 = "SELECT * FROM `blog_content` WHERE blog_id = (SELECT id FROM `blog` WHERE title = '$id');";
        $array = mysqli_query($this->connect,$array);
        $array2 = mysqli_query($this->connect,$array2);
        $result=[];
        while($s = mysqli_fetch_array($array, MYSQLI_ASSOC)){
            array_push($result,$s);
        }
        while($s = mysqli_fetch_array($array2, MYSQLI_ASSOC)){
            array_push($result,$s);
        }
        if ($result) 
            return $result;
        else
        return [];
    }
    
}

?>