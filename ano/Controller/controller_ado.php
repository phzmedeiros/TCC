<?php

if (isset($_POST['acao'])) {
    include_once '../Model/crud.php';
    
    $nome_adotante = $_POST["nome_adotante"];
    $descricao_bloqueio = $_POST["descricao_bloqueio"];
    $cpf = $_POST["cpf"];
    $data_bloqueio = $_POST["data_bloqueio"];
    $voluntario_que_registrou = $_POST["voluntario_que_registrou"];

    $inserir = new crud();
    $inserir->cadastrar_Adotante($nome_adotante, $descricao_bloqueio, $cpf, $data_bloqueio, $voluntario_que_registrou);
}
?>
