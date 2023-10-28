<!DOCTYPE html>
<html>

<head>
    <title>Usuários Cadastrados</title>
</head>

<body>
    <h1>Usuários Cadastrados</h1>
    <table border="1">
        <tr>
            <h3>Todos os usuarios</h3>
            <th>Nome</th>
            <th>Email</th>
        </tr>
        <?php
        require_once '../Model/crud.php';
        $crud = new crud();
        $termos = $crud->selecionar_Todos_Termos_Aceitos();

        foreach ($termos as $termo) {
            echo "<tr>";
            echo "<td>{$termo['nome']}</td>";
            echo "<td>{$termo['email']}</td>";
            echo "</tr>";
        }
        ?>
    </table><br><br><br>



    <h3>Busca por email</h3>
    <form action="termos_aceitos.php" method="post">
        <label for="searchEmail">Pesquisar por Email:</label>
        <input type="text" name="searchEmail" id="searchEmail" placeholder="Digite o Email">
        <input type="submit" value="Pesquisar">
    </form>

    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Email</th>
        </tr>

        <?php
        require_once '../Model/crud.php';
        $crud = new crud();

        // Verifica se um email de pesquisa foi submetido
        if (isset($_POST['searchEmail'])) {
            $searchEmail = $_POST['searchEmail'];
            $termos = $crud->selecionar_Um_Termo_Por_Email($searchEmail);
        } else {
            // $termos = $crud->selecionar_Todos_Termos_Aceitos();
            echo "Deu ruim man";
        }

        foreach ($termos as $termo) {
            echo "<tr>";
            echo "<td>{$termo['nome']}</td>";
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