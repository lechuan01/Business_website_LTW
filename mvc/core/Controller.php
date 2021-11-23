<?php
class Controller{
    public function callmodel($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function callview($view, $data = [], $layout = "layout"){
        require_once "./mvc/views/layout/" . $layout . ".php";
        // require_once "./mvc/views/".$view.".php";
    }
}
?>