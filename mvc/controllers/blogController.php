<?php

class blogController extends Controller{
    public function show(){
        $blogs = $this->callmodel("BlogDB");
        $blogs = $blogs->getAll();
        $this->callview("blog",["blog"=> $blogs]);
    }
}

?>