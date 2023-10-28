<?php
$botao = filter_input(INPUT_POST, 'botao', FILTER_SANITIZE_STRING);

if (isset($botao)) {
    include_once '../Model/crud.php';
    
    $nome_do_voluntario = filter_input(INPUT_POST, 'nome_do_voluntario', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    $usuario = new crud();
    $usuario->selecionar_Usuario($nome_do_voluntario, $senha);
}
