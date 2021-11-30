<?php

class blogController extends Controller{
    public function show(){
        $blogs = $this->callmodel("BlogDB");
        $blogs = $blogs->getAll();
        $this->callview("blog",["blog"=> $blogs]);
    }
    public function detail($param){
        console_log($param['title']);
        $blogs = $this->callmodel("BlogDB");
        $blogs = $blogs->getById($param['title']);
        console_log($blogs);
        $this->callview("blogDetail",["blog"=> $blogs]);
    }
}

?>