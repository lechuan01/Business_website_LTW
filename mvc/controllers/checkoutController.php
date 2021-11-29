<?php

class checkoutController extends Controller{
    # hiển thị hóa đơn than toán 
    public function show(){
        $this->callview("checkout");
    }
    # thêm hóa đơn vào csdl
    function create($type){
        $add = $this->callmodel("OrderDB");
        $add = $add->AddOrder($type['type']);
        header("Location: /home");
    }
}
    
?>