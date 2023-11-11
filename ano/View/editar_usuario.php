<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Voluntário</title>
</head>

<body>
    <h1>Editar Voluntário</h1>

    <?php
    require_once '../Model/crud.php';
    $crud = new crud();

    // Verifica se o CPF do usuário foi passado pela URL
    if (isset($_GET['cpf'])) {
        $cpf = $_GET['cpf'];
        $usuario = $crud->selecionar_Um_Usuario_Por_Cpf($cpf);

        // Verifica se o usuário foi encontrado e se o índice 'cpf' existe na array $usuario
        if ($usuario && isset($usuario['cpf'])) {
            echo "<form action='editar_usuario_processar.php' method='get'>";
            echo "<input type='hidden' name='cpf' value='{$usuario['cpf']}'>";

            // Campos adicionados para edição
            echo "<label for='nome_do_voluntario'>Nome:</label>";
            echo "<input type='text' name='nome_do_voluntario' value='{$usuario['nome_do_voluntario']}' required><br>";

            echo "<label for='email'>Email:</label>";
            echo "<input type='email' name='email' value='{$usuario['email']}' required><br>";

            echo "<label for='endereco'>Endereço:</label>";
            echo "<input type='text' name='endereco' value='{$usuario['endereco']}'><br>";

            echo "<label for='profissao'>Profissão:</label>";
            echo "<input type='text' name='profissao' value='{$usuario['profissao']}'><br>";

            echo "<label for='cell'>Celular:</label>";
            echo "<input type='text' name='cell' value='{$usuario['cell']}'><br>";

            echo "<label for='tell_emergencia'>Telefone de Emergência:</label>";
            echo "<input type='text' name='tell_emergencia' value='{$usuario['tell_emergencia']}'><br>";

            echo "<label for='rg'>RG:</label>";
            echo "<input type='text' name='rg' value='{$usuario['rg']}'><br>";

            echo "<label for='equipe_pertencente'>Equipe que pertence:</label>";
            echo "<input type='text' name='equipe_pertencente' value='{$usuario['equipe_pertencente']}'><br>";

            echo "<label for='obs'>Observações:</label>";
            echo "<textarea name='obs'>{$usuario['obs']}</textarea><br>";

            // Botão de submit
            echo "<br>";
            echo "<input type='submit' name='acao' value='Salvar Alterações'>";
            echo "</form>";
        } else {
            echo "<p>Usuário não encontrado.</p>";
        }
    } else {
        echo "<p>CPF não fornecido.</p>";
    }
    ?>

    <br><br><br>

    <!-- Botão de voltar -->
    <form action="usuarios_cadastrados.php">
        <input type="submit" value="Cancelar e Voltar"><br>
    </form>
</body>

</html>
