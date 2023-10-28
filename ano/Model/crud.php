<?php

require "conexao.php";

session_start();

class crud
{

    function selecionar_Usuario($nome_do_voluntario, $senha)
    {
        $conn = conectar();
        $sql = "SELECT * FROM usuariosa WHERE nome_do_voluntario = :nome_do_voluntario AND senha = :senha LIMIT 1";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nome_do_voluntario', $nome_do_voluntario, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                $_SESSION['usuarioNome'] = $resultado['nome_do_voluntario'];
                $_SESSION['usuarioSenha'] = $resultado['senha'];
                echo "<script language='javascript' type='text/javascript'>alert('Logado com sucesso!');window.location.href='../View/perfil_usuario.php';</script>";
                //header("Location: ../View/perfil_usuario.php");
                exit(); // Importante para interromper a execução após redirecionar
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Nome e/ou senha errados!');window.location.href='../View/frm_logar.html';</script>";
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function adesao($nome, $email)
    {
        $conn = conectar();
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];

            if (empty($nome) || empty($email)) {
                $message = 'Por favor, preencha todos os campos.';
            } else {
                $sql = "INSERT INTO adesao (nome, email) VALUES (:nome, :email)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    $message = 'Termo aceito com sucesso';
                    echo "<script>alert('Termo aceito com sucesso'); window.location.href='../View/perfil_usuario.php';</script>";
                } else {
                    echo "<script>alert('Erro! É preciso aceitar o termo de adesão');</script>";
                }
            }
        }
    }

    function selecionar_Todos_Termos_Aceitos()
    {
        $conn = conectar();
        $sql = "SELECT * FROM adesao";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return array();
        }
    }

    function selecionar_Um_Termo_Por_Email($email)
    {
        $conn = conectar();
        $sql = "SELECT * FROM adesao WHERE email = :email";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return array();
        }
    }
    //FUNÇÃO PARA CADASTRAR UM NOVO USUÁRIO NA TABELA DE USUÁRio
    function cadastrar_Usuario($nome_do_voluntario, $email, $endereco, $profissao, $cell, $tell_emergencia, $rg, $cpf, $equipe_pertencente, $obs)
    {
        $conn = conectar();

        $sql = "INSERT INTO usuarios (nome_do_voluntario, email, endereco, profissao, cell, tell_emergencia, rg, cpf, equipe_pertencente, obs) 
                VALUES (:nome_do_voluntario, :email, :endereco, :profissao, :cell, :tell_emergencia, :rg, :cpf, :equipe_pertencente, :obs)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome_do_voluntario', $nome_do_voluntario, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
        $stmt->bindParam(':profissao', $profissao, PDO::PARAM_STR);
        $stmt->bindParam(':cell', $cell, PDO::PARAM_STR);
        $stmt->bindParam(':tell_emergencia', $tell_emergencia, PDO::PARAM_STR);
        $stmt->bindParam(':rg', $rg, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $stmt->bindParam(':equipe_pertencente', $equipe_pertencente, PDO::PARAM_STR);
        $stmt->bindParam(':obs', $obs, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "<script language='javascript' type='text/javascript'>
                  alert('Usuário cadastrado com sucesso');
                  window.location.href='../View/perfil_usuario.php';
                  </script>";
        } else {
            echo "Erro ao cadastrar o usuário: " . $stmt->errorInfo()[2];
        }
    }

    function selecionar_Todos_Usuarios()
    {
        $conn = conectar();
        $sql = "SELECT * FROM usuarios";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return array();
        }
    }

    function excluir_Usuario($cpf)
    {
        $conn = conectar();

        $sql = "DELETE FROM usuarios WHERE cpf = :cpf";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_INT);

        try {
            if ($stmt->execute()) {
                echo "<script language='javascript' type='text/javascript'>
                  alert('Usuário excluído com sucesso');
                  window.location.href='../View/usuarios_cadastrados.php';
                  </script>";
            } else {
                echo "Erro ao excluir o usuário: " . $stmt->errorInfo()[2];
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }


    // function atualizar_Usuario($cpf, $nome, $email, $endereco, $profissao, $cell, $tell_emergencia, $rg, $equipe_pertencente, $obs)
// {
//     $conn = conectar();

    //     // Atualiza o registro do usuário no banco de dados
//     $sql = "UPDATE usuarios SET nome_do_voluntario = :nome, email = :email, endereco = :endereco, profissao = :profissao, cell = :cell, tell_emergencia = :tell_emergencia, rg = :rg, equipe_pertencente = :equipe_pertencente, obs = :obs WHERE cpf = :cpf";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':cpf', $cpf);
//     $stmt->bindParam(':nome', $nome);
//     $stmt->bindParam(':email', $email);
//     $stmt->bindParam(':endereco', $endereco);
//     $stmt->bindParam(':profissao', $profissao);
//     $stmt->bindParam(':cell', $cell);
//     $stmt->bindParam(':tell_emergencia', $tell_emergencia);
//     $stmt->bindParam(':rg', $rg);
//     $stmt->bindParam(':equipe_pertencente', $equipe_pertencente);
//     $stmt->bindParam(':obs', $obs);

    //     try {
//         if ($stmt->execute()) {
//             // Redireciona de volta para a página de usuários cadastrados
//             header("Location: usuarios_cadastrados.php");
//             exit();
//         } else {
//             echo "Erro ao atualizar o usuário: " . $stmt->errorInfo()[2];
//         }
//     } catch (PDOException $e) {
//         echo "Erro: " . $e->getMessage();
//     }
// }



    //funcoes adotante

    function cadastrar_Adotante($nome_adotante, $descricao_bloqueio, $cpf, $data_bloqueio, $voluntario_que_registrou)
    {
        $conn = conectar();

        $sql = "INSERT INTO ado_block (nome_adotante, descricao_bloqueio, cpf, data_bloqueio, voluntario_que_registrou) 
                VALUES (:nome_adotante, :descricao_bloqueio, :cpf, :data_bloqueio, :voluntario_que_registrou)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome_adotante', $nome_adotante, PDO::PARAM_STR);
        $stmt->bindParam(':descricao_bloqueio', $descricao_bloqueio, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $stmt->bindParam(':data_bloqueio', $data_bloqueio, PDO::PARAM_STR);
        $stmt->bindParam(':voluntario_que_registrou', $voluntario_que_registrou, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "<script language='javascript' type='text/javascript'>
                  alert('Adotante cadastrado com sucesso');
                  window.location.href='../View/adotantes_cadastrados.php';
                  </script>";
        } else {
            echo "Erro ao cadastrar o adotante: " . $stmt->errorInfo()[2];
        }
    }


    function selecionar_Todos_Adotantes()
    {
        $conn = conectar();
        $sql = "SELECT * FROM ado_block";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return array();
        }
    }

    function selecionar_Adotante_Por_CPF($cpf)
    {
        $conn = conectar();
        $sql = "SELECT * FROM ado_block WHERE cpf = :cpf";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return array();
        }
    }

    function criar_Equipes(
        $nome_da_equipe,
        $nome_do_voluntario_lider,
        $nome_do_voluntario_1,
        $nome_do_voluntario_2,
        $nome_do_voluntario_3,
        $nome_do_voluntario_4,
        $nome_do_voluntario_5
    ) {
        $conn = conectar();

        $sql = "INSERT INTO equipes (
            nome_da_equipe,
            nome_do_voluntario_lider,
            nome_do_voluntario_1,
            nome_do_voluntario_2,
            nome_do_voluntario_3,
            nome_do_voluntario_4,
            nome_do_voluntario_5
        ) VALUES (
            :nome_da_equipe,
            :nome_do_voluntario_lider,
            :nome_do_voluntario_1,
            :nome_do_voluntario_2,
            :nome_do_voluntario_3,
            :nome_do_voluntario_4,
            :nome_do_voluntario_5
        )";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome_da_equipe', $nome_da_equipe, PDO::PARAM_STR);
        $stmt->bindParam(':nome_do_voluntario_lider', $nome_do_voluntario_lider, PDO::PARAM_STR);
        $stmt->bindParam(':nome_do_voluntario_1', $nome_do_voluntario_1, PDO::PARAM_STR);
        $stmt->bindParam(':nome_do_voluntario_2', $nome_do_voluntario_2, PDO::PARAM_STR);
        $stmt->bindParam(':nome_do_voluntario_3', $nome_do_voluntario_3, PDO::PARAM_STR);
        $stmt->bindParam(':nome_do_voluntario_4', $nome_do_voluntario_4, PDO::PARAM_STR);
        $stmt->bindParam(':nome_do_voluntario_5', $nome_do_voluntario_5, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "<script language='javascript' type='text/javascript'>
                  alert('Equipe cadastrada com sucesso');
                  window.location.href='../View/equipes_cadastradas.php';
                  </script>";
        } else {
            echo "Erro ao cadastrar a equipe: " . $stmt->errorInfo()[2];
        }
    }

    function selecionar_Todas_Equipes()
    {
        $conn = conectar();
        $sql = "SELECT * FROM equipes";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return array();
        }
    }

}
?>