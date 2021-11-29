<?php

class UserDB extends DB{
    # thêm tài khoản người dùng mới vào csdl
    public function InsertNewUser($id, $fullName, $password, $phoneNumber, $email, $address, $role)
    {
        $qr = "INSERT INTO accounts VALUES('$id','$fullName','$password','$phoneNumber','$email','$address','$role')";
        $result = mysqli_query($this->connect, $qr);
        return json_encode($result);
    }
    function getAll(){
        $array = "SELECT * FROM `product`;";
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
    function getbyPhoneNumber($phoneNumber){
        $sql = "SELECT * FROM `accounts` WHERE phone_number = ".$phoneNumber.";";
        return mysqli_query($this->connect, $sql);
    }

    function getById($id){
        $sql = "SELECT * FROM `accounts` WHERE phone_number = ".$id.";";
        return mysqli_query($this->connect, $sql);
    }
    
}

?>