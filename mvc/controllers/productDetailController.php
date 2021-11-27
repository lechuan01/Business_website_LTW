<?php

class productDetailController extends Controller{
    public function show(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $this->callview("productDetail");
    }
    public function review(){
        
    }
}

?>