<?php

class productController extends Controller{
    public function show(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $this->callview("product");
    }
    public function productDetail() {
        $this->callview("productDetail");
    }
}

?>