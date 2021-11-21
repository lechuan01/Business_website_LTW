<?php

class adminController extends Controller{
    public function show(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $this->callview("admin/dashboard", "layoutAdmin");
    }
}

?>