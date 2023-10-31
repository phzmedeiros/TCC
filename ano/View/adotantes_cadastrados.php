<!DOCTYPE html>
<html>

<head>
    <title>Adotantes Cadastrados</title>
</head>

<body>
    <h1>Adotantes Cadastrados</h1>

    <h3>Busca por CPF</h3>
    <form action="adotantes_cadastrados.php" method="post">
        <label for="searchCPF">Pesquisar por CPF:</label>
        <input type="text" name="searchCPF" id="searchCPF" placeholder="Digite o CPF">
        <input type="submit" value="Pesquisar">
    </form>

    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Descrição do bloqueio</th>
            <th>CPF</th>
            <th>Data e hora do bloqueio</th>
            <th>Voluntário que bloqueou</th>
        </tr>

        <?php
        require_once '../Model/crud.php';
        $crud = new crud();

        // Verifica se um CPF de pesquisa foi submetido
        if (isset($_POST['searchCPF'])) {
            $searchCpf = $_POST['searchCPF'];
            $adotantes = $crud->selecionar_Adotante_Por_CPF($searchCpf);
        } else {
            // Se nenhum CPF de pesquisa foi submetido, exiba todos os adotantes.
            $adotantes = $crud->selecionar_Todos_Adotantes();
        }

        foreach ($adotantes as $adotante) {
            echo "<tr>";
            echo "<td>{$adotante['nome_adotante']}</td>";
            echo "<td>{$adotante['descricao_bloqueio']}</td>";
            echo "<td>{$adotante['cpf']}</td>";
            echo "<td>{$adotante['data_bloqueio']}</td>";
            echo "<td>{$adotante['voluntario_que_registrou']}</td>";
            echo "<td><a href='excluir_adotante.php?cpf={$adotante['cpf']}'>Excluir</a></td>";
            echo "</tr>";
        }
        ?>
    </table><br><br><br>
    <form action="perfil_usuario.php">
        <input type="submit" value="Voltar"><br>
    </form>
</body>

</html>