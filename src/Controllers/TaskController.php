<?php 

namespace App\Controllers;

use Exception;

class TaskController extends AbstractController{

    public function index(array $currentRoute){ 
        // we brought tasks
        $tasks = require_once 'data.php';
        $data = [
            'route' =>  'list',
            'generator' => $currentRoute['generator'],
            'data' => $tasks
        ];
        $this->render($data);
    }

    public function show(array $currentRoute){
        // On appelle la liste des tâches
        $tasks = require_once "data.php";

        // Par défaut, on imagine qu'aucun id n'a été précisé
        $id = $currentRoute['id'];

        // Si aucun id n'est passé ou que l'id n'existe pas dans la liste des tâches, on arrête tout !
        if (!$id || !array_key_exists($id, $tasks)) {
            throw new Exception("La tâche demandée n'existe pas !");
        }

        // Si tout va bien, on récupère la tâche correspondante et on affiche
        $task = $tasks[$id];

        $data = [
            'route' =>  'show',
            'generator' => $currentRoute['generator'],
            'data' => $tasks,
            'task' => $task
        ];

       // $this->render('show', $currentRoute, $generator, $data, $task);
       $this->render($data);
    }

    public function insert(array $currentRoute){

        // Si la requête arrive en POST, c'est qu'on a soumis le formulaire :
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Traitement à la con (enregistrement en base de données, redirection, envoi d'email, etc)...
            var_dump("Bravo, le formulaire est soumis (TODO : traiter les données)", $_POST);

            // Arrêt du script
            return;
        }
        $data = [
            'route' =>  'create',
            'generator' => $currentRoute['generator'],
        ];

        $this->render($data);
    }
}
?>