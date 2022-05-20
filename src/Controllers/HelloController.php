<?php 

namespace App\Controllers;

class HelloController{
    public function sayHello(array $currentRoute){
        require_once '././pages/hello.php';
    }
}

?>