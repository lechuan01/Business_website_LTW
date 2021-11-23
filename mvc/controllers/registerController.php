<?php

class registerController extends Controller{
    public function show(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $this->callview("register");
    }
    public $UserDB;
    # kết nối cơ sở dữ liệU UserDB
    public function __construct(){
        $this->UserDB = $this->callmodel("UserDB");
    }
    # hiển thị trang đăng ký 
    /* public function show(){
        $this->callview("Home",["page"=>"Register"]);
    } */
   # đăng ký tài khoản khách hàng
    public function registerUser(){
        //1. get data user nhập
            $id = uniqid();
            $fullName = trim($_POST["fullName"]);
            $password = trim($_POST["password"]);
            $confirmPassword = trim($_POST["confirmPassword"]);
            if($password != $confirmPassword) echo "false";
            else{
                $password = password_hash($password, PASSWORD_DEFAULT);
                $fullName = trim($_POST["fullName"]);
                $phoneNumber = trim($_POST["phoneNumber"]);
                $email = trim($_POST["email"]);
                $address = trim($_POST["address"]);
                $role = "MEM";
                // 2. Insert database bảng accounts
                $kq = $this->UserDB->InsertNewUser($id, $fullName, $password, $phoneNumber, $email, $address, $role);
                // 3. Show kết quả thành công/ thất bại
                echo $kq;
            }
            
        }
    }
    # đăng ký tài khoản nhân viên

?>