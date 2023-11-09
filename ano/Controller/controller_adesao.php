<?php
if (isset($_POST['acao'])) {
    include_once '../Model/crud.php';

    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];

    $inserir = new Crud();
    $inserir->adesao($nome, $cpf, $email);
}
?>