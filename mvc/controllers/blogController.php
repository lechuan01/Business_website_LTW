<?php

class blogController extends Controller{
    public function show(){
        $blogs = $this->callmodel("BlogDB");
        $blogs = $blogs->getAll();
        $this->callview("blog",["blog"=> $blogs]);
    }
    public function detail($title){
        $blogs = $this->callmodel("BlogDB");
        $blogs = $blogs->getAll();
        $this->callview("blogDetail",["blog"=> $blogs]);
    }
}

?>