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
            <th>Nome do 1º Voluntário</th>
            <th>Nome do 2º Voluntário</th>
            <th>Nome do 3º Voluntário</th>
            <th>Nome do 4º Voluntário</th>
            <th>Nome do 5º Voluntário</th>
        </tr>

        <?php
        require_once '../Model/crud.php';
        $crud = new crud();
        $equipes = $crud->selecionar_Todas_Equipes();

        foreach ($equipes as $equipe) {
            echo "<tr>";
            echo "<td>{$equipe['nome_da_equipe']}</td>";
            echo "<td>{$equipe['nome_do_voluntario_lider']}</td>";
            echo "<td>{$equipe['nome_do_voluntario_1']}</td>";
            echo "<td>{$equipe['nome_do_voluntario_2']}</td>";
            echo "<td>{$equipe['nome_do_voluntario_3']}</td>";
            echo "<td>{$equipe['nome_do_voluntario_4']}</td>";
            echo "<td>{$equipe['nome_do_voluntario_5']}</td>";
            echo "</tr>";
        }
        ?>
    </table><br><br><br>
    <form action="perfil_usuario.php">
        <input type="submit" value="Voltar"><br>
    </form>
</body>

</html>
