<?php

function conectar()
{
    $host = 'localhost';
    $dbname = 'aaano';
    $usuario = 'root';
    $senha = ''; // Insira sua senha aqui, se houver

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $senha);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        return "Não conseguimos conectar: " . $e->getMessage();
    }
}

?>