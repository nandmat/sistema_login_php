<?php

$server = "127.0.0.1";
$usuario = "root";
$senha = "";
$db = "login";
try {
    $conexao = new PDO("mysql:host=$server;dbname=$db", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "Ocorreu um erro de execução: {$erro->getMessage()}";
    $conexao = null;
}
