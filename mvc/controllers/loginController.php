<?php

class loginController extends Controller{
    public $UserDB;
    # Tạo kết nối đến UserDB
    public function __construct()
    {
        $this->UserDB = $this->callmodel("UserDB");
    }
    public function show(){
        $this->callview("login");
    }
    public function login(){
        $phoneNumber = trim($_POST["phoneNumber"]);
        $password_input = trim($_POST["password"]);
        $result = $this->UserDB->getbyPhoneNumber($phoneNumber);
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['id'];
                $password = $row['password'];
                $role = $row['role'];
                $name = $row['full_name'];
                $accept = $row['accept'];
            }
           
            if($role == "ADM"){ //admin
                if (password_verify($password_input, $password)) {
                    $_SESSION["idadmin"] = $id;
                    $_SESSION["role"] = "ADM";
                    $_SESSION["name"] = $name;
                    echo "true/ADM";
                } 
                else {
                    echo "false/null";
                    //echo "Mật khẩu không đúng";
                }
            }
            else{
                if (password_verify($password_input, $password)) {
                    if ($accept == 'T') {
                        $_SESSION["id"] = $id;
                        $_SESSION["role"] = "MEM";
                        $_SESSION["name"] = $name;
                        echo "true/MEM";
                    }
                    else if ($accept == 'F') {
                        echo "false/restrict";
                    }
                } 
                else {
                    echo "false/null";
                    //echo "Mật khẩu không đúng";
                }
            }
        } 
        else {
            echo 'false';
            //echo "Số điện thoại không đúng";
        }
    }
    
    #đăng xuất khỏi hệ thống
    public function logout(){
        if (isset($_SESSION["idadmin"])) {
            unset($_SESSION["idadmin"]);
            if(session_destroy()){
                echo 'true';
            }
            else echo 'false';
        }
        else {
            unset($_SESSION["id"]);
            if(session_destroy()){
                echo 'true';
            }
            else echo 'false';
        }
    }
}

?>