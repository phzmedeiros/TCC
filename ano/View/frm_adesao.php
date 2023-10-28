<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Adesão</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        form {
            background: #fff;
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
        }
        form input[type="text"],
        form input[type="email"],
        form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form input[type="checkbox"] {
            margin-right: 5px;
        }
        form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        form input[type="submit"]:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
        form a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <form action="../Controller/controller_adesao.php" method="post">
        <input type="checkbox" name="aceito" value="aceito" id="aceito" required> Aceitar os <a href="javascript:;" class="m-link m-link--focus">Termos e Condições</a>
        <br><br>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <br>
        <label for="email">E-mail:</label>
        <input type="email" name="email" required>
        <br>
        <br>
        <input type="submit" name="acao" value="Submit">
    </form>
</body>
</html>
