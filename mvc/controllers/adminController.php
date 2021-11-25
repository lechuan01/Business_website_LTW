<?php

class adminController extends Controller{
    public function __construct() {
        $this->AdminProductDB = $this->callmodel("AdminProductDB");
    }
    public function show(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $this->callview("admin/dashboard", [], "layoutAdmin");
    }
    public function product(){
        $listProduct = $this->AdminProductDB->getAll();
        $this->callview("admin/product", ["listProduct" => $listProduct], "layoutAdmin");
    }
    public function productAdd () {
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $specs = $_POST["specs"];
            $price = $_POST["price"];
            $qty = $_POST["qty"];
            $category = $_POST["category"];

            if (isset($_FILES["thumnail"])) {
                $file_name = $_FILES['thumnail']['name'];
                $file_tmp = $_FILES['thumnail']['tmp_name'];
                move_uploaded_file($file_tmp, "public/upload/products/".$file_name);
                foreach($_FILES["product_image"]["name"] as $key => $val) {
                    //TODO: INSERT TO DATABASE HERE
                    move_uploaded_file($_FILES["product_image"]["tmp_name"][$key], "public/upload/products/".$val);
                }
            }
            
            
            
        }
    }

    public function orders(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $this->callview("admin/orders", [], "layoutAdmin");
    }
    public function member(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $this->callview("admin/member", [], "layoutAdmin");
    }
    public function blog(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $this->callview("admin/blog", [], "layoutAdmin");
    }
    public function comment(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $this->callview("admin/comment", [], "layoutAdmin");
    }
}
