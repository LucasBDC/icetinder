<?php
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'icetinder';

    $mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if($mysqli->error)
    {
        die("Falha ao conectar ao banco de dados: " .$mysqli->error);
    }

