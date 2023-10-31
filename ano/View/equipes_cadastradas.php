<!-- equipes_cadastradas.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Equipes Cadastradas</title>
</head>

<body>
    <h1>Equipes Cadastradas</h1>
    <table border="1">
        <tr>
            <th>Nome da Equipe</th>
            <th>Nome do Líder</th>
            <th>Voluntários</th>
        </tr>

        <?php
        require_once '../Model/crud.php';
        $crud = new crud();
        $equipes = $crud->selecionar_Todas_Equipes();

        foreach ($equipes as $equipe) {
            echo "<tr>";
            echo "<td>{$equipe['nome_da_equipe']}</td>";
            echo "<td>{$equipe['nome_do_voluntario_lider']}</td>";
            
            echo "<td>";
            echo "Nome do Líder: {$equipe['nome_do_voluntario_lider']}<br>";
            
            for ($i = 1; $i <= 5; $i++) {
                $voluntarioNome = $equipe["nome_do_voluntario_" . $i];
                if (!empty($voluntarioNome)) {
                    echo "Nome do " . ($i + 1) . "&ordm; Voluntário: $voluntarioNome<br>";
                }
            }
            echo "";
            //echo "<td><a href='excluir_equipes.php?nome_da_equipe={$equipe['nome_da_equipe']}'>Excluir</a></td>";
            echo "</td>";
            
            echo "</tr>";
        }
        ?>
    </table><br><br><br>
    <form action="perfil_usuario.php">
        <input type="submit" value="Voltar"><br>
    </form>
</body>

</html>
