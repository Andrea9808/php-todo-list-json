<?php


    //imposta l'intestazione HTTP per specificare che il tipo di contenuto della risposta è di tipo JSON. 
    //utile quando si restituiscono dati JSON dal server al client.
    header('Content-Type: application/json');

    // è un'intestazione HTTP, per gestire le politiche di controllo degli accessi (CORS)
    header("Access-Control-Allow-Headers: X-Requested-With");

    //riferimento al server dove verrà posizionato
    header("Access-Control-Allow-Origin: http://localhost:5175");

    //prendiamo o "imprtiamo" json
    $jsonTodos = file_get_contents("todos.json");

    //decodifichiamo
    $todos = json_decode($jsonTodos, true);

    //prendo il parametro task
    $task = $_POST['task'];

    //creo il nuovo array
    $newTask = [
        'task' => $task,
        'completed' => false,
    ];

    //inserisco l'array creato all'interno della codifica del json
    $todos[] = $newTask;

    //codifico
    $jsonTodos = json_encode($todos);

    //inserisco tutto all'interno del json
    file_put_contents("todos.json",$jsonTodos);
    
    //scrivo
    echo $jsonTodos;

