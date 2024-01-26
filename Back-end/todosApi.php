
<?php

    //imposta l'intestazione HTTP per specificare che il tipo di contenuto della risposta è di tipo JSON. 
    //utile quando si restituiscono dati JSON dal server al client.
    header('Content-Type: application/json');

    // è un'intestazione HTTP, per gestire le politiche di controllo degli accessi (CORS)
    header("Access-Control-Allow-Headers: X-Requested-With");

    //riferimento al server dove verrà posizionato
    header("Access-Control-Allow-Origin: http://localhost:5173");


    //NON NE ABBIAMO PIU' BISOGNO PERCHè LO DECODIFICHIAMO TRAMITE IL FILE JSON
    // $todos = [
    //         [
    //             'task' => 'Comprare il pane',
    //             'completed' => false,
    //         ],
    //         [
    //             'task' => 'Pulire il soggiorno',
    //             'completed' => true,
    //         ],
    //         [
    //             'task' => 'Stendere i panni',
    //             'completed' => false,
    //         ],
    //         [
    //             'task' => 'Fare la lavatrice',
    //             'completed' => false,
    //         ],
    //         [
    //             'task' => 'Scrivere codice',
    //             'completed' => true,
    //         ],
    // ];

    //prende tutti i dati all'interno del file json
    $jsonTodos = file_get_contents("todos.json");

    //per vedere se tutto ok
    echo $jsonTodos;

?>



