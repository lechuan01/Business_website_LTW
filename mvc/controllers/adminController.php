<?php

class adminController extends Controller{
    public function __construct() {
        $this->AdminProductDB = $this->callmodel("AdminProductDB");
        $this->AdminMemberDB = $this->callmodel("AdminMemberDB");
        $this->AdminOrdersDB = $this->callmodel("AdminOrdersDB");
        $this->AdminCommentDB = $this->callmodel("AdminCommentDB");

        $this->UserDB = $this->callmodel("UserDB");
    }
    public function show(){
        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "ADM") {
                $this->callview("admin/dashboard", [], "layoutAdmin");
            }
            else {
                echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
            }
        }
        else {
            echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
        }
    }
    public function product(){
        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "ADM") {
                $listProduct = $this->AdminProductDB->getAll();
                $this->callview("admin/product", ["listProduct" => $listProduct], "layoutAdmin");
            }
            else {
                echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
            }
        }
        else {
            echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
        }
        
    }
    public function productAdd () {
        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "ADM") {
                if (isset($_POST["submit"])) {
                    $name = $_POST["name"];
                    $specs = $_POST["specs"];
                    $check_price = is_numeric($_POST["price"]);
                    if ($check_price) {
                        $price = $_POST["price"];
                        $qty = $_POST["qty"];
                        $category = $_POST["category"];
                        if (isset($_FILES["thumnail"])) {
                            $file_name = $_FILES['thumnail']['name'];
                            $file_tmp = $_FILES['thumnail']['tmp_name'];
                            move_uploaded_file($file_tmp, "public/upload/products/".$file_name);
                            $image_array = [];
                            $numOfImages = count($_FILES["product_image"]['name']);
                            if ($numOfImages != 4) {
                                alert("BẠN CẦN TẢI LÊN ĐÚNG 4 TẤM ẢNH");
                                return;
                            }
                            else {
                                foreach($_FILES["product_image"]["name"] as $key => $val) {
                                    array_push($image_array, $_FILES["product_image"]["name"][$key]);
                                    move_uploaded_file($_FILES["product_image"]["tmp_name"][$key], "public/upload/products/".$val);
                                }
                            }
                        }
                        $result = $this->AdminProductDB->insert($name, $specs, $price, $qty, $category, $file_name, $image_array);
                        if ($result == "true") {
                            header("Location: /admin/product");
                        }
                        else {
                            alert($result);
                        }
                    }
                    else {
                        alert("GIÁ TIỀN KHÔNG HỢP LỆ");
                    }
                }
            }
            else {
                echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
            }
        }
        else {
            echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
        }
    }

    public function productDelete () {
        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "ADM") {
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
            else {
                echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
            }
        }
        else {
            echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
        }
    }
    public function productEdit($params) {
        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "ADM") {
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
            else {
                echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
            }
        }
        else {
            echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
        }
    }
    public function productUpdate($params) {
        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "ADM") {
                if (isset($_POST["submit"])) {
                    $id = $params["id"];
                    $name = $_POST["name"];
                    $specs = $_POST["specs"];
                    $check_price = is_numeric($_POST["price"]);
                    if ($check_price) {
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
                        if ($result == "true") {
                            header("Location: /admin/product");
                        }
                        else {
                            alert($result);
                        }
                    }
                    else {
                        alert("GIÁ TIỀN KHÔNG HỢP LỆ");
                    }
                }
            }
            else {
                echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
            }
        }
        else {
            echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
        }
    }
    public function orders(){
        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "ADM") {
                $listOrders = $this->AdminOrdersDB->getAll();
                $this->callview("admin/orders", ["listOrders" => $listOrders], "layoutAdmin");
            }
            else {
                echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
            }
        }
        else {
            echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
        }
            
    }
    public function Ordersdetail($params) {
        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "ADM") {
                $id = $params["id"];
                $items = $this->AdminOrdersDB->get_item_byID($id);
                if ($items) {
                    echo json_encode($items);
                }
                else {
                    echo json_encode(404);
                }
            }
            else {
                echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
            }
        }
        else {
            echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
        } 
    }
    public function completeOrder() {
        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "ADM") {
                $id = $_POST["id"];
                $res = $this->AdminOrdersDB->completeOrderbyid($id);
                if ($res) {
                    echo true;
                }
                else {
                    echo false;
                }
            }
            else {
                echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
            }
        }
        else {
            echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
        } 
    }
    public function member(){
        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "ADM") {
                $members = $this->AdminMemberDB->getAll();
                $this->callview("admin/member", ["members" => $members], "layoutAdmin");
            }
            else {
                echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
            }
        }
        else {
            echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
        } 
    }
    public function memberRestrict() {
        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "ADM") {
                if (isset($_POST["id"])) {
                    $id = $_POST["id"];
                    $res = $this->UserDB->restrictUser($id, 'F');
                    if ($res == "true") {
                        echo json_decode(200);
                    }
                    else {
                        echo json_encode($res);
                    }
                }
            }
            else {
                echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
            }
        }
        else {
            echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
        } 
    }
    public function memberUnrestrict() {
        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "ADM") {
                if (isset($_POST["id"])) {
                    $id = $_POST["id"];
                    $res = $this->UserDB->restrictUser($id, 'T');
                    if ($res == "true") {
                        echo json_decode(200);
                    }
                    else {
                        echo json_encode($res);
                    }
                }
            }
            else {
                echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
            }
        }
        else {
            echo "<h1 style='text-align: center;'>Bạn không có quyền truy cập vào trang này <a href='/'>Quay lại</a></h1>";
        } 
    }
    // public function blog(){
    //     $this->callview("admin/blog", [], "layoutAdmin");
    // }
    public function comment(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $listComments = $this->AdminCommentDB->getAll();
            $this->callview("admin/comment", ["listComments" => $listComments], "layoutAdmin");
        //$this->callview("admin/comment", [], "layoutAdmin");
    }
    public function commentDelete() {
        $id = $_POST["id"];
        $m_id = $_POST["m_id"];
        $res = $this->AdminCommentDB->deleteComment($id,$m_id);
       if ($res) {
           echo true;
       }
       else {
           echo false;
       }
    }
    public function listComment() {
        // Get id from client
        $items = $this->AdminCommentDB->listcomment();
        if ($items) {
            echo json_encode($items);
        }
        else {
            echo json_encode(404);
        }
    }
    public function loggout() {
        if (isset($_SESSION["idadmin"])) {
            unset($_SESSION["idadmin"]);
            if(session_destroy()){
                header("Location: /");
            }
        }
    }
}
