<?php

class orderController extends Controller{
    # hiển thị hóa đơn than toán 
    public function show(){
        $list = $this->callmodel("OrderDB");
        $list = $list->getOrderbyId();
        $this->callview("order",['orderlist'=>$list]);
    }
    public function showdetail(){
        $list = $this->callmodel("OrderDB");
        $list = $list->getOrderDetailbyId($_POST['id']);
        print_r(json_encode($list));
    }
    public function cancel(){
        $list = $this->callmodel("OrderDB");
        $list = $list->cancelOrder($_POST['id']);
    }
}
    
?>