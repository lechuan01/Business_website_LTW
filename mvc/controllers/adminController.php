<?php

class adminController extends Controller{
    public function __construct() {
        $this->AdminProductDB = $this->callmodel("AdminProductDB");
        $this->AdminMemberDB = $this->callmodel("AdminMemberDB");
        $this->AdminOrdersDB = $this->callmodel("AdminOrdersDB");
    }
    public function show(){
        // console_log([password_hash("admin", PASSWORD_DEFAULT), uniqid()]);
        // if (isset($_SESSION["role"])) {
            // if ($_SESSION["role"] == "ADM") {
                $this->callview("admin/dashboard", [], "layoutAdmin");
            // }
            // else {
            //     echo "You don't have permission to access this site";
            // }
        // }
        // else {
        //     echo "You don't have permission to access this site";
        // }
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
                $image_array = [];
                foreach($_FILES["product_image"]["name"] as $key => $val) {
                    array_push($image_array, $_FILES["product_image"]["name"][$key]);
                    move_uploaded_file($_FILES["product_image"]["tmp_name"][$key], "public/upload/products/".$val);
                }
            }
            $result = $this->AdminProductDB->insert($name, $specs, $price, $qty, $category, $file_name, $image_array);
            if ($result) {
                header("Location: /admin/product");
            }
        }
    }

    public function productDelete () {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $res = $this->AdminProductDB->deleteById($id);
            if ($res) {
                echo true;
            }
            else {
                echo false;
            }
        }
    }
    public function productEdit($params) {
        // Get id from client
        $id = $params["id"];
        $products = $this->AdminProductDB->getbyID($id);
        if ($products) {
            echo json_encode($products);
        }
        else {
            echo json_encode(404);
        }
    }
    public function productUpdate($params) {
        if (isset($_POST["submit"])) {
            $id = $params["id"];
            $name = $_POST["name"];
            $specs = $_POST["specs"];
            $price = $_POST["price"];
            $qty = $_POST["qty"];
            $category = $_POST["category"];
            $thumnail = null;
            $image_array = [];
            if (isset($_FILES["thumnail"])) {
                $file_name = $_FILES['thumnail']['name'];
                $thumnail = $file_name;
                $file_tmp = $_FILES['thumnail']['tmp_name'];
                move_uploaded_file($file_tmp, "public/upload/products/".$file_name);
            }
            if (isset($_FILES["product_image"])) {
                foreach($_FILES["product_image"]["name"] as $key => $val) {
                    array_push($image_array, $_FILES["product_image"]["name"][$key]);
                    move_uploaded_file($_FILES["product_image"]["tmp_name"][$key], "public/upload/products/".$val);
                }
            }
            $result = $this->AdminProductDB->updateById($id, $name, $specs, $price, $qty, $category, $thumnail, $image_array);
            // if ($result) {
            //     header("Location: /admin/product");
            // }
        }
    }
    public function orders(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
            $listOrders = $this->AdminOrdersDB->getAll();
            $this->callview("admin/orders", ["listOrders" => $listOrders], "layoutAdmin");
    }
    public function Ordersdetail($params) {
        // Get id from client
        $id = $params["id"];
        $items = $this->AdminOrdersDB->get_item_byID($id);
        if ($items) {
            echo json_encode($items);
        }
        else {
            echo json_encode(404);
        }
    }
    public function member(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $members = $this->AdminMemberDB->getAll();
        $this->callview("admin/member", ["members" => $members], "layoutAdmin");
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
