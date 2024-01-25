
<?php

    header('Content-Type: application/json');

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

    $jsonTodos = json_encode($todos);
    file_put_contents("todos.json", $jsonTodos);

    

?>