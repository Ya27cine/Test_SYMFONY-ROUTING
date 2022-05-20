<?php 

namespace App\Controllers;

class HelloController{
    public function sayHello(array $currentRoute){
        $name = $currentRoute["name"];
        require_once '././pages/hello.php';
    }
}

?>