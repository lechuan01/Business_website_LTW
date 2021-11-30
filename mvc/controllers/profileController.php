<?php

class profileController extends Controller{
    public function __construct() {
        $this->UserDB = $this->callmodel("UserDB");
    }
    public function show(){
        // $blogs = $this->callmodel("BlogDB");
        // $blogs = $blogs->getAll();
        if (isset($_SESSION["id"])) {
            $id = $_SESSION["id"];
            $result = $this->UserDB->getById($id);
            console_log($result[0]['full_name']);
            $this->callview("profile",["profile" => $result[0]]);
        }   
    }
    public function update() {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $data = $_POST["data"];

            $full_name = $data[0]['value'];
            $phone = $data[1]['value'];
            $email = $data[2]['value'];
            $address = $data[3]['value'];
            $res = $this->UserDB->updateUser($id, $full_name, $phone, $email, $address);
            if ($res == "true") {
                echo json_encode(200);
            }
            else {
                echo json_encode(array(304, $res));
            }
            
        }
    }
    
}

?>