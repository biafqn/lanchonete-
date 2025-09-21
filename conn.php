<?php

$user = "root";
$server = "localhost";
$senha = "";
$dbName = "lanchonete";
$port = "3306";

$conn = new mysqli($server, $user, $senha, $dbName, $port);

if ($conn == true) {
    echo "Conectado com Sucesso!";
} else {
    echo "Error";
}
