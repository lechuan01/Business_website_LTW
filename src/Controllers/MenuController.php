<?php

class MenuController extends Controller{
    public function show(){
        $menu = $this->callmodel("DishDB");
        $menu = $menu->getDB();
        $this->callview("Menu",["menu"=>$menu]);
    }
}

?>