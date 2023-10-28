<?php
if (isset($_POST['acao'])) {
    include_once '../Model/crud.php';

    $nome_da_equipe = $_POST["nome_da_equipe"];
    $nome_do_voluntario_lider = $_POST["nome_do_voluntario_lider"];
    $nome_do_voluntario_1 = $_POST["nome_do_voluntario_1"];
    $nome_do_voluntario_2 = $_POST["nome_do_voluntario_2"];
    $nome_do_voluntario_3 = $_POST["nome_do_voluntario_3"];
    $nome_do_voluntario_4 = $_POST["nome_do_voluntario_4"];
    $nome_do_voluntario_5 = $_POST["nome_do_voluntario_5"];
    
    // Crie uma instância da classe 'crud'
    $inserir = new crud();

    // Chame a função 'criar_Equipes' para inserir os dados no banco de dados
    $inserir->criar_Equipes(
        $nome_da_equipe,
        $nome_do_voluntario_lider,
        $nome_do_voluntario_1,
        $nome_do_voluntario_2,
        $nome_do_voluntario_3,
        $nome_do_voluntario_4,
        $nome_do_voluntario_5
    );
}
?>
