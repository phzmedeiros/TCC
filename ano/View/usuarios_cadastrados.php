<!DOCTYPE html>
<html>

<head>
    <title>Voluntários Cadastrados</title>
</head>

<body>
    <h1>Voluntários Cadastrados</h1>

    <!-- Tabela de voluntários cadastrados -->
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Endereço</th>
            <th>Profissão</th>
            <th>Celular</th>
            <th>Telefone de Emergencia</th>
            <th>RG</th>
            <th>CPF</th>
            <th>Equipe que pertence</th>
            <th>Observações</th>
            <th>Opções</th>
        </tr>
        <?php
        require_once '../Model/crud.php';
        $crud = new crud();
        $usuarios = $crud->selecionar_Todos_Usuarios();

        foreach ($usuarios as $usuario) {
            echo "<tr>";
            echo "<td>{$usuario['nome_do_voluntario']}</td>";
            echo "<td>{$usuario['email']}</td>";
            echo "<td>{$usuario['endereco']}</td>";
            echo "<td>{$usuario['profissao']}</td>";
            echo "<td>{$usuario['cell']}</td>";
            echo "<td>{$usuario['tell_emergencia']}</td>";
            echo "<td>{$usuario['rg']}</td>";
            echo "<td>{$usuario['cpf']}</td>";
            echo "<td>{$usuario['equipe_pertencente']}</td>";
            echo "<td>{$usuario['obs']}</td>";
            echo "<td><a href='excluir_usuario.php?cpf={$usuario['cpf']}'>Excluir</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <br><br><br>

    <!-- Formulário de busca por CPF -->
    <h3>Busca por CPF</h3>
    <form action="usuarios_cadastrados.php" method="post">
        <label for="searchCpf">Pesquisar por CPF:</label>
        <input type="text" name="searchCpf" id="searchCpf" placeholder="Digite o CPF">
        <input type="submit" value="Pesquisar">
    </form>

    <br><br><br>

    <!-- Tabela de resultados da busca por CPF -->
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Endereço</th>
            <th>Profissão</th>
            <th>Celular</th>
            <th>Telefone de Emergencia</th>
            <th>RG</th>
            <th>CPF</th>
            <th>Equipe que pertence</th>
            <th>Observações</th>
            <th>Opções</th>
        </tr>
        <?php
        // Verifica se um CPF de pesquisa foi submetido
        if (isset($_POST['searchCpf'])) {
            $searchCpf = $_POST['searchCpf'];
            $crud = new crud();
            $usuariosEncontrados = $crud->selecionar_Um_Usuario_Por_Cpf($searchCpf);

            // Exibe os resultados da busca
            foreach ($usuariosEncontrados as $usuario) {
                echo "<tr>";
                echo "<td>{$usuario['nome_do_voluntario']}</td>";
                echo "<td>{$usuario['email']}</td>";
                echo "<td>{$usuario['endereco']}</td>";
                echo "<td>{$usuario['profissao']}</td>";
                echo "<td>{$usuario['cell']}</td>";
                echo "<td>{$usuario['tell_emergencia']}</td>";
                echo "<td>{$usuario['rg']}</td>";
                echo "<td>{$usuario['cpf']}</td>";
                echo "<td>{$usuario['equipe_pertencente']}</td>";
                echo "<td>{$usuario['obs']}</td>";
                echo "<td><a href='excluir_usuario.php?cpf={$usuario['cpf']}'>Excluir</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>

    <br><br><br>

    <!-- Botão de voltar -->
    <form action="perfil_usuario.php">
        <input type="submit" value="Voltar"><br>
    </form>
</body>

</html>
