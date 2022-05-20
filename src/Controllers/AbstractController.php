<?php 
 namespace App\Controllers;


 abstract class AbstractController{
    private  $path =  '././pages/';

    protected function render($page, array $currentRoute = null, $generator=null){
        require_once $this->path . $page.".php";
    }
     
 }