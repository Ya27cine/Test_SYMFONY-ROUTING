<?php 

namespace App\Controllers;

class TaskController{

    public function index(){
        require_once '././pages/index.php';
    }
    public function show(array $currentRoute){
        require_once '././pages/show.php';
    }
    public function insert(array $currentRoute){
        require_once '././pages/create.php';
    }
}
?>