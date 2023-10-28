<?php

if (isset($_POST['acao'])) {
    include_once '../Model/crud.php';

    $nome_do_voluntario = $_POST["nome_do_voluntario"];
    $email = $_POST["email"];
    $endereco = $_POST["endereco"];
    $profissao = $_POST["profissao"];
    $cell = $_POST["cell"];
    $tell_emergencia = $_POST["tell_emergencia"];
    $rg = $_POST["rg"];
    $cpf = $_POST["cpf"];
    $equipe_pertencente = $_POST["equipe_pertencente"];
    $obs = $_POST["obs"];

    $inserir = new crud();
    $inserir->cadastrar_Usuario($nome_do_voluntario, $email, $endereco, $profissao, $cell, $tell_emergencia, $rg, $cpf, $equipe_pertencente, $obs);
}
?>