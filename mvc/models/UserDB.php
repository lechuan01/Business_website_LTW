<?php

class UserDB extends DB{
    # thêm tài khoản người dùng mới vào csdl
    public function InsertNewUser($id, $fullName, $password, $phoneNumber, $email, $address, $role, $accept)
    {
        $qr = "INSERT INTO accounts VALUES('$id','$fullName','$password','$phoneNumber','$email','$address','$role', '$accept')";
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
        $sql = "SELECT * FROM `accounts` WHERE `id` = '$id'";
        $result = mysqli_query($this->connect, $sql);
        if ($result) {
            $data = [];
            while ($row = mysqli_fetch_array($result)) {
                array_push($data, $row);
            }
            return $data;
        }
        else {
            return array(mysqli_error($this->connect));
        }
    }
    function updateUser($id, $full_name, $phone_number, $email, $address) {
        $sql = "UPDATE accounts SET full_name = '$full_name', phone_number = '$phone_number', email = '$email', `address` = '$address' WHERE id = '$id'";
        $res = $this->connect->query($sql);
        if ($res) {
            return "true";
        }
        else {
            return mysqli_error($this->connect);
        }
    }
    function restrictUser($id, $type) {
        $sql = "UPDATE accounts SET accept = '$type' WHERE id = '$id'";
        $res = $this->connect->query($sql);
        if ($res) {
            return "true";
        }
        else {
            return mysqli_error($this->connect);
        }
    }
}

?>