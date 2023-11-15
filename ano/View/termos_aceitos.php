<!DOCTYPE html>
<html>
<head>
    <title>Voluntários que aceitaram</title>
</head>

<body>
    <h1>Voluntários que aceitaram</h1>
    <table border="1">
        <tr>
            <h3>Todos os voluntários</h3>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
        </tr>
        <?php
        require_once '../Model/crud.php';
        $crud = new crud();
        $termos = $crud->selecionar_Todos_Termos_Aceitos();

        foreach ($termos as $termo) {
            echo "<tr>";
            echo "<td>{$termo['nome']}</td>";
            echo "<td>{$termo['cpf']}</td>";
            echo "<td>{$termo['email']}</td>";
            echo "</tr>";
        }
        ?>
    </table><br><br><br>



    <h3>Busca por Cpf</h3>
    <form action="termos_aceitos.php" method="post">
        <label for="searchCpf">Pesquisar por Cpf:</label>
        <input type="text" name="searchCpf" id="searchCpf" placeholder="Digite o Cpf">
        <input type="submit" value="Pesquisar">
    </form>

    <table border="1">
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
        </tr>

        <?php
        require_once '../Model/crud.php';
        $crud = new crud();

        // Verifica se um email de pesquisa foi submetido
        if (isset($_POST['searchCpf'])) {
            $searchCpf = $_POST['searchCpf'];
            $termos = $crud->selecionar_Um_Termo_Por_Cpf($searchCpf);
        } else {
            // $termos = $crud->selecionar_Todos_Termos_Aceitos();
            echo "Deu ruim man";
        }

        foreach ($termos as $termo) {
            echo "<tr>";
            echo "<td>{$termo['nome']}</td>";
            echo "<td>{$termo['cpf']}</td>";
            echo "<td>{$termo['email']}</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <br>
    <br>
    <br>
    <form action="perfil_usuario.php">
        <input type="submit" value="Voltar"><br>
    </form>
</body>

</html>


<!-- <head>
    <title>Voluntários que aceitaram</title>
</head>

<body>
    <h1>Voluntários que aceitaram</h1>
    <table border="1">
        <tr>
            <h3>Todos os voluntários</h3>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
        </tr>
        ?php
        require_once '../Model/crud.php';
        $crud = new crud();
        $termos = $crud->selecionar_Todos_Termos_Aceitos();

        foreach ($termos as $termo) {
            echo "<tr>";
            echo "<td>{$termo['nome']}</td>";
            echo "<td>{$termo['cpf']}</td>";
            echo "<td>{$termo['email']}</td>";
            echo "</tr>";
        }
        ?>
    </table><br><br><br>



    <h3>Busca por Cpf</h3>
    <form action="termos_aceitos.php" method="post">
        <label for="searchCpf">Pesquisar por Cpf:</label>
        <input type="text" name="searchCpf" id="searchCpf" placeholder="Digite o Cpf">
        <input type="submit" value="Pesquisar">
    </form>

    <table border="1">
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
        </tr>

        ?php
        require_once '../Model/crud.php';
        $crud = new crud();

        // Verifica se um email de pesquisa foi submetido
        if (isset($_POST['searchCpf'])) {
            $searchCpf = $_POST['searchCpf'];
            $termos = $crud->selecionar_Um_Termo_Por_Cpf($searchCpf);
        } else {
            // $termos = $crud->selecionar_Todos_Termos_Aceitos();
            echo "Deu ruim man";
        }

        foreach ($termos as $termo) {
            echo "<tr>";
            echo "<td>{$termo['nome']}</td>";
            echo "<td>{$termo['cpf']}</td>";
            echo "<td>{$termo['email']}</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <br>
    <br>
    <br>
    <form action="perfil_usuario.php">
        <input type="submit" value="Voltar"><br>
    </form>
</body> -->