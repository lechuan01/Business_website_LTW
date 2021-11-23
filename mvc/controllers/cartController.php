<?php

class cartController extends Controller{
    public function show(){
        // $menu = $this->callmodel("DishDB");
        // $menu = $menu->getDB();
        $this->callview("cart");
    }
    # giam so luong cua mon an
    function ReduceQuantity($params){
        if(isset($params['id'])){
            $_SESSION['Cart'][$params['id']]['choose']--;
            print_r(json_encode([$_SESSION['Cart'][$params['id']]['choose'],$_SESSION['Cart'][$params['id']]['price']]));
        }
    }
    # tăng so luong cua mon an
    function IncreaseQuantity($params){
        if(isset($params['id'])){
            $_SESSION['Cart'][$params['id']]['choose']++;
            print_r(json_encode([$_SESSION['Cart'][$params['id']]['choose'],$_SESSION['Cart'][$params['id']]['price']]));
        }
    }
    # xoa mon an khoi gio
    function RemoveItem($params){
        unset($_SESSION['Cart'][$params['id']]);
    }
    # tính tổng giá tiền trong giỏ hàng
    // function TotalPrice(){
    //     $sum = 0;
    //     foreach ($_SESSION['Cart'] as $key => $value){
    //         $sum += $value['choose']*$value['price'];
    //     }
    //     echo $sum;
    // }

}

?>