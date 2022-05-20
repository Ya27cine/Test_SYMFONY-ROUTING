<?php 
 namespace App\Controllers;


 abstract class AbstractController{
    private  $path =  '././pages/';

    protected function render($data){
        extract($data);
        require_once $this->path . $route.".html.php";
    }
     
 }