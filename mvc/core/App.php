<?php
function console_log($d) {
    echo '<script>';
    echo 'console.log('.json_encode($d).');';
    echo '</script>';
}
class App{

    protected $controller="homeController";
    protected $action="show";
    protected $params=[];
    function __construct(){
        $url = $this->UrlProcess();
        // Controller
        if( file_exists("./mvc/controllers/".$url[0]."controller.php") ){
            $this->controller = $url[0]."Controller";
            console_log($this->controller);
            unset($url[0]);
        }
        require_once "./mvc/controllers/". $this->controller .".php";
        $this->controller = new $this->controller;

        // Action
        if(isset($url[1])){
            if( method_exists( $this->controller , $url[1]) ){
                $this->action = $url[1];
            }
            unset($url[1]);
        }

        call_user_func_array([$this->controller, $this->action], $this->params );

    }

    function UrlProcess(){ 
        $uri = $_SERVER['REQUEST_URI'];
        $tmp1 = explode("/", filter_var(trim($uri, "/")));
        $tmp2 = explode("?", $tmp1[count($tmp1) - 1]);
        if (count($tmp2) > 1) {
            $this->params = explode("=", $tmp2[count($tmp2) - 1]);
        }

        $arr_tmp = array_slice($tmp1, 0, count($tmp1)-1);
        array_push($arr_tmp, $tmp2[0]);
        return $arr_tmp;
    }

}
?>