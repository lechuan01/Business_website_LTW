<?php

class ReviewDB extends DB{
    # thêm tài khoản người dùng mới vào csdl
    public function InsertNewUser($id, $fullName, $password, $phoneNumber, $email, $address, $role)
    {
        $qr = "INSERT INTO accounts VALUES('$id','$fullName','$password','$phoneNumber','$email','$address','$role')";
        $result = mysqli_query($this->connect, $qr);
        return json_encode($result);
    }
    
}

?>