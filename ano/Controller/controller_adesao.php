<?php
if (isset($_POST['acao'])) {
    include_once '../Model/crud.php';

    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $inserir = new Crud();
    $inserir->adesao($nome, $email);
}
?>