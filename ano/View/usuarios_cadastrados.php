<!DOCTYPE html>
<html>

<head>
    <title>Usuários Cadastrados</title>
</head>

<body>
    <h1>Usuários Cadastrados</h1>
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
            echo "<td><a href='excluir_usuario.php?cpf={$usuario['cpf']}'>Excluir</a></td>"; // Adiciona link para exclusão
            //echo "<td><a href='frm_alterar_usuarios.html?cpf={$usuario['cpf']}'>Alterar</a></td>"; // Adicione o link de alteração
            echo "</tr>";
        }
        ?>
    </table><br><br><br>
    <form action="perfil_usuario.php">
        <input type="submit" value="Voltar"><br>
    </form>
</body>

</html>
