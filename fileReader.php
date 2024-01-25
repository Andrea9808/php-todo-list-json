<!-- Test -->

<?php

    //recupera i dati salvati precedentemente nel fil JSON e li "importo"
    $jsonTodos = file_get_contents("todos.json");

    //converte stringa json in una struttura PHP
    $todos = json_decode($jsonTodos, true);

    var_dump($todos);
?>