<?php
function console_log($d) {
    echo '<script>';
    echo 'console.log('.json_encode($d).');';
    echo '</script>';
}
function alert($d) {
    echo '<script>';
    echo 'alert('.json_encode($d).');';
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
        call_user_func([$this->controller, $this->action], $this->params);

    }

    function UrlProcess(){ 
        $url_components = parse_url($_SERVER['REQUEST_URI']);
        if(!empty($url_components['query']))
            parse_str($url_components['query'], $this->params);
        $index = explode("/", filter_var(trim($_SERVER['PHP_SELF'], "/")));
        $arr_tmp = explode("/", filter_var(trim($url_components['path'], "/")));
        array_splice($arr_tmp, 0, count(array_intersect($index,$arr_tmp))); 
        return $arr_tmp;
    }

}
?>