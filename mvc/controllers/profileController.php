<?php

class profileController extends Controller{
    public function __construct() {
        $this->UserDB = $this->callmodel("UserDB");
    }
    public function show(){
        // $blogs = $this->callmodel("BlogDB");
        // $blogs = $blogs->getAll();
        // $phone = $_SESSION[]
        // $user = $this->UserDB->getbyPhoneNumber();
        $this->callview("profile",[]);
    }
    
}

?>