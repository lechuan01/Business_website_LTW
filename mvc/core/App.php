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
        if ($url) {
            // Controller
            if( file_exists("./mvc/controllers/".$url[0]."Controller.php") ){
                $this->controller = $url[0]."Controller";
                unset($url[0]);
            }            
        }
        require_once "./mvc/controllers/". $this->controller .".php";
        $this->controller = new $this->controller;

        if ($url) {
            // Action
            if(isset($url[1])){
                if( method_exists( $this->controller , $url[1]) ){
                    $this->action = $url[1];
                }
                unset($url[1]);
            }
        }

        call_user_func_array([$this->controller, $this->action], $this->params);

    }

    function UrlProcess(){ 
        $uri = $_SERVER['REQUEST_URI'];
        $index = explode("/", filter_var(trim($_SERVER['PHP_SELF'], "/")));
        $arr_tmp = [];
        $tmp1 = explode("/", filter_var(trim($uri, "/")));
        array_splice($tmp1, 0, count(array_intersect($index,$tmp1)));
        if ($tmp1) {
            $tmp2 = explode("?", $tmp1[count($tmp1) - 1]);
            if (count($tmp2) > 1) {
                $this->params = explode("=", $tmp2[count($tmp2) - 1]);
            }
            $arr_tmp = array_slice($tmp1, 0, count($tmp1)-1);
            array_push($arr_tmp, $tmp2[0]);
        }
        

        return $arr_tmp;
    }

}
?>