<?php

class loginController extends Controller{
    public function show(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $this->callview("login");
    }
}

?>