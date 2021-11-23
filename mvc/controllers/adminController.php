<?php

class adminController extends Controller{
    public function show(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $this->callview("admin/dashboard", "layoutAdmin");
    }
    public function product(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $this->callview("admin/product", "layoutAdmin");
    }
    public function orders(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $this->callview("admin/orders", "layoutAdmin");
    }
    public function member(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $this->callview("admin/member", "layoutAdmin");
    }
    public function blog(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $this->callview("admin/blog", "layoutAdmin");
    }
    public function comment(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $this->callview("admin/comment", "layoutAdmin");
    }
}

?>