<?php
if (isset($_GET['acao'])) {
    include_once '../Model/crud.php';

    // Recupera os dados do formulário
    $cpf = $_GET['cpf'];

    $nome_do_voluntario = $_GET["nome_do_voluntario"];
    $email = $_GET["email"];
    $endereco = $_GET["endereco"];  // Adicione os campos restantes...
    $profissao = $_GET["profissao"];
    $cell = $_GET["cell"];
    $tell_emergencia = $_GET["tell_emergencia"];
    $rg = $_GET["rg"];
    $equipe_pertencente = $_GET["equipe_pertencente"];
    $obs = $_GET["obs"];

    // Cria uma instância da classe 'crud'
    $crud = new crud();

    // Chama a função 'atualizar_Usuario' para atualizar os dados no banco de dados
    $crud->atualizar_Usuario($cpf, $nome_do_voluntario, $email, $endereco, $profissao, $cell, $tell_emergencia, $rg, $equipe_pertencente, $obs);


    // Redireciona de volta para a página de detalhes do usuário
    header("Location: detalhes_usuario.php?cpf=$cpf");
    exit();
}
?>
