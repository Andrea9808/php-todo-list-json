
<?php
    //imposta l'intestazione HTTP per specificare che il tipo di contenuto della risposta è di tipo JSON. 
    //utile quando si restituiscono dati JSON dal server al client.
    header('Content-Type: application/json');

    // è un'intestazione HTTP, per gestire le politiche di controllo degli accessi (CORS)
    header("Access-Control-Allow-Headers: X-Requested-With");

    //riferimento al server dove verrà posizionato
    header("Access-Control-Allow-Origin: http://localhost:5173");

    $todos = [
            [
                'task' => 'Comprare il pane',
                'completed' => false,
            ],
            [
                'task' => 'Pulire il soggiorno',
                'completed' => true,
            ],
            [
                'task' => 'Stendere i panni',
                'completed' => false,
            ],
            [
                'task' => 'Fare la lavatrice',
                'completed' => false,
            ],
            [
                'task' => 'Scrivere codice',
                'completed' => true,
            ],
    ];

    //converte stringa json in una struttura PHP
    $jsonTodos = json_encode($todos);

    //per vedere se tutto ok
    echo $jsonTodos;

?>



