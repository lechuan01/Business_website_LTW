<?php

class productController extends Controller{
    public function show(){
        $list = $this->callmodel("DishDB");
        $list = $list->getAll();
        $this->callview("product",["product"=> $list]);
    }
    public function productDetail($param) {
        $list = $this->callmodel("DishDB");
        $list = $list->getbyID($param['id']);
        $this->callview("productDetail",["detail"=> $list]);
    }
    public function Store($param) {
        $Iddish = $param['id'];
        $dish = $this->callmodel("DishDB");
        $dish = $dish->getItem($Iddish);
        $dish = $dish[0];
        if(empty($_SESSION['Cart'])){
            $dish['choose']=1;
            $_SESSION['Cart'][$Iddish]=$dish;
        }
        else if(!array_key_exists($Iddish,$_SESSION['Cart'])){
            $dish['choose']=1;
            $_SESSION['Cart'][$Iddish]=$dish;
        }
        else{
            $_SESSION['Cart'][$Iddish]['choose'] += 1;
        }
        echo count($_SESSION["Cart"]);
    }
}

?>