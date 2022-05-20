<?php 

namespace App\Controllers;

class TaskController extends AbstractController{

    public function index(array $currentRoute, $generator){ 
        $this->render('list',$currentRoute, $generator);
    }
    public function show(array $currentRoute, $generator){
        $this->render('show', $currentRoute);
    }
    public function insert(array $currentRoute, $generator){
        $this->render('create', $currentRoute);
    }
}
?>