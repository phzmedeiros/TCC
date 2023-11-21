<?php
if (isset($_POST['acao'])) {
    include_once '../Model/crud.php';

    $nome_da_equipe = $_POST["nome_da_equipe"];
    
    // Check if the key exists before accessing its value
    $nome_do_voluntario_lider = isset($_POST["nome_do_voluntario_lider"]) ? $_POST["nome_do_voluntario_lider"] : null;

    $quantidade = $_POST["quantidade"];

    $voluntarios = [];
    for ($i = 1; $i <= $quantidade; $i++) {
        if (isset($_POST["nome_do_voluntario_$i"])) {
            $voluntarios[] = $_POST["nome_do_voluntario_$i"];
        }
    }

    // Crie uma instância da classe 'crud'
    $inserir = new crud();

    // Chame a função 'criar_Equipes' para inserir os dados no banco de dados
    $inserir->criar_Equipes($nome_da_equipe, $nome_do_voluntario_lider, $voluntarios);
}
?>
