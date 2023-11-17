<?php
require "conexao.php";
// session_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class crud
{

    function selecionar_Usuario($nome_do_voluntario, $senha)
    {
        $conn = conectar(); // Conecta ao banco de dados
        $sql = "SELECT * FROM usuariosa WHERE nome_do_voluntario = :nome_do_voluntario AND senha = :senha LIMIT 1"; // Consulta SQL para selecionar usuário por nome e senha
        try {
            $stmt = $conn->prepare($sql); // Prepara a consulta
            $stmt->bindParam(':nome_do_voluntario', $nome_do_voluntario, PDO::PARAM_STR); // Atribui parâmetros
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
            $stmt->execute(); // Executa a consulta

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC); // Obtém o resultado

            if ($resultado) {
                $_SESSION['usuarioNome'] = $resultado['nome_do_voluntario']; // Inicia ou resuma a sessão e define variáveis de sessão
                $_SESSION['usuarioSenha'] = $resultado['senha'];
                echo "<script language='javascript' type='text/javascript'>alert('Logado com sucesso!');window.location.href='../View/perfil_usuario.php';</script>"; // Exibe alerta em JavaScript e redireciona o usuário
                //header("Location: ../View/perfil_usuario.php");
                exit(); // Importante para interromper a execução após redirecionar
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Nome e/ou senha errados!');window.location.href='../View/frm_logar.html';</script>"; // Exibe alerta em JavaScript e redireciona o usuário
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage(); // Trata exceções PDO
        }
    }

    function selecionar_Todos_Termos_Aceitos()
    {
        $conn = conectar(); // Conecta ao banco de dados
        $sql = "SELECT * FROM adesao"; // Consulta SQL para selecionar todos os termos aceitos
        try {
            $stmt = $conn->prepare($sql); // Prepara a consulta
            $stmt->execute(); // Executa a consulta
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna o resultado como array associativo
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage(); // Trata exceções PDO e exibe mensagem de erro
            return array(); // Retorna array vazio em caso de erro
        }
    }

    function selecionar_Um_Termo_Por_Cpf($cpf)
    {
        $conn = conectar(); // Conecta ao banco de dados
        $sql = "SELECT * FROM adesao WHERE cpf = :cpf"; // Consulta SQL para selecionar termo por CPF
        try {
            $stmt = $conn->prepare($sql); // Prepara a consulta
            $stmt->bindParam(':cpf', $cpf); // Atribui parâmetro
            $stmt->execute(); // Executa a consulta
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna o resultado como array associativo
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage(); // Trata exceções PDO e exibe mensagem de erro
            return array(); // Retorna array vazio em caso de erro
        }
    }

    //FUNÇÃO PARA CADASTRAR UM NOVO USUÁRIO NA TABELA DE USUÁRio
    function cadastrar_Usuario($nome_do_voluntario, $email, $endereco, $profissao, $cell, $tell_emergencia, $rg, $cpf, $equipe_pertencente, $obs)
    {
        $conn = conectar(); // Conecta ao banco de dados

        $sql = "INSERT INTO usuarios (nome_do_voluntario, email, endereco, profissao, cell, tell_emergencia, rg, cpf, equipe_pertencente, obs) 
                VALUES (:nome_do_voluntario, :email, :endereco, :profissao, :cell, :tell_emergencia, :rg, :cpf, :equipe_pertencente, :obs)"; // Consulta SQL para inserir novo usuário
        $stmt = $conn->prepare($sql); // Prepara a consulta
        $stmt->bindParam(':nome_do_voluntario', $nome_do_voluntario, PDO::PARAM_STR); // Atribui parâmetros
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
                  </script>"; // Exibe alerta em JavaScript e redireciona o usuário
        } else {
            echo "Erro ao cadastrar o usuário: " . $stmt->errorInfo()[2]; // Exibe mensagem de erro em caso de falha
        }
    }

    //TESTE 1 de ocultar Noticias
    function selecionar_Todos_Usuarios()
    {
        $conn = conectar(); // Estabelece uma conexão com o banco de dados.
        $sql = "SELECT * FROM usuarios"; // Consulta SQL para selecionar todos os usuários da tabela 'usuarios'.

        error_reporting(E_ALL & ~E_NOTICE); // Configura o relatório de erros para ocultar notificações.
        ini_set('display_errors', 0); // Desabilita a exibição de erros na saída.

        try {
            $stmt = $conn->prepare($sql); // Prepara a consulta SQL.
            $stmt->execute(); // Executa a consulta.

            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos os resultados como um array associativo.
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage(); // Exibe uma mensagem de erro se a execução da consulta falhar.
            return array(); // Retorna um array vazio em caso de erro.
        }
    }

    //TESTE 2 de ocultar Noticias
    // function selecionar_Todos_Usuarios()
    // {
    //     // Verificar se uma sessão está ativa
    //     if (session_status() === PHP_SESSION_NONE) {
    //         session_start();
    //     }

    //     $conn = conectar();
    //     $sql = "SELECT * FROM usuarios";

    //     error_reporting(E_ALL & ~E_NOTICE);
    //     ini_set('display_errors', 0);

    //     $status = session_status();
    //     echo "O status da sessão é: $status";

    //     try {
    //         $stmt = $conn->prepare($sql);
    //         $stmt->execute();

    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         echo "Erro: " . $e->getMessage();
    //         return array();
    //     }
    // }

    //TESTE 3 de ocultar Noticias
    // function selecionar_Todos_Usuarios()
    // {
    //     $conn = conectar();
    //     $sql = "SELECT * FROM usuarios";
    //     $status = session_status();
    //     echo "O status da sessão é: $status";

    //     try {
    //         $stmt = $conn->prepare($sql);
    //         $stmt->execute();

    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         echo "Erro: " . $e->getMessage();
    //         return array();
    //     }
    // }

    function selecionar_Um_Usuario_Por_Cpf($cpf)
    {
        $conn = conectar(); // Estabelece uma conexão com o banco de dados.
        $sql = "SELECT * FROM usuarios WHERE cpf = :cpf"; // Consulta SQL para selecionar um usuário com base no CPF.

        try {
            $stmt = $conn->prepare($sql); // Prepara a consulta SQL.
            $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR); // Vincula o parâmetro :cpf à variável $cpf assegurando que seja tratado como string.
            $stmt->execute(); // Executa a consulta.

            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos os resultados como um array associativo.
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage(); // Exibe uma mensagem de erro se a execução da consulta falhar.
            return array(); // Retorna um array vazio em caso de erro.
        }
    }

    function excluir_Usuario($cpf)
    {
        $conn = conectar(); // Estabelece uma conexão com o banco de dados.

        $sql = "DELETE FROM usuarios WHERE cpf = :cpf"; // Consulta SQL para excluir um usuário com base no CPF.

        $stmt = $conn->prepare($sql); // Prepara a consulta SQL.
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_INT); // Vincula o parâmetro :cpf à variável $cpf assegurando que seja tratado como inteiro.

        try {
            if ($stmt->execute()) {
                echo "<script language='javascript' type='text/javascript'>
                  alert('Usuário excluído com sucesso');
                  window.location.href='../View/usuarios_cadastrados.php';
                  </script>";
            } else {
                echo "Erro ao excluir o usuário: " . $stmt->errorInfo()[2]; // Exibe uma mensagem de erro se a execução da consulta falhar.
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage(); // Exibe uma mensagem de erro se ocorrer uma exceção do tipo PDOException.
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

    // Função para cadastrar um adotante no banco de dados
    function cadastrar_Adotante($nome_adotante, $descricao_bloqueio, $cpf, $data_bloqueio, $voluntario_que_registrou)
    {
        $conn = conectar(); // Estabelece uma conexão com o banco de dados.

        $sql = "INSERT INTO ado_block (nome_adotante, descricao_bloqueio, cpf, data_bloqueio, voluntario_que_registrou) 
            VALUES (:nome_adotante, :descricao_bloqueio, :cpf, :data_bloqueio, :voluntario_que_registrou)"; // Consulta SQL para inserir um adotante.

        $stmt = $conn->prepare($sql); // Prepara a consulta SQL.
        $stmt->bindParam(':nome_adotante', $nome_adotante, PDO::PARAM_STR); // Vincula o parâmetro :nome_adotante à variável $nome_adotante assegurando que seja tratado como string.
        $stmt->bindParam(':descricao_bloqueio', $descricao_bloqueio, PDO::PARAM_STR); // Vincula o parâmetro :descricao_bloqueio à variável $descricao_bloqueio assegurando que seja tratado como string.
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR); // Vincula o parâmetro :cpf à variável $cpf assegurando que seja tratado como string.
        $stmt->bindParam(':data_bloqueio', $data_bloqueio, PDO::PARAM_STR); // Vincula o parâmetro :data_bloqueio à variável $data_bloqueio assegurando que seja tratado como string.
        $stmt->bindParam(':voluntario_que_registrou', $voluntario_que_registrou, PDO::PARAM_STR); // Vincula o parâmetro :voluntario_que_registrou à variável $voluntario_que_registrou assegurando que seja tratado como string.

        if ($stmt->execute()) {
            echo "<script language='javascript' type='text/javascript'>
              alert('Adotante cadastrado com sucesso');
              window.location.href='../View/adotantes_cadastrados.php';
              </script>"; // Exibe uma mensagem de sucesso e redireciona para a página de adotantes cadastrados em caso de sucesso na execução da consulta.
        } else {
            echo "Erro ao cadastrar o adotante: " . $stmt->errorInfo()[2]; // Exibe uma mensagem de erro se a execução da consulta falhar.
        }
    }

    // Função para selecionar todos os adotantes no banco de dados
    function selecionar_Todos_Adotantes()
    {
        $conn = conectar(); // Estabelece uma conexão com o banco de dados.
        $sql = "SELECT * FROM ado_block"; // Consulta SQL para selecionar todos os adotantes.

        try {
            $stmt = $conn->prepare($sql); // Prepara a consulta SQL.
            $stmt->execute(); // Executa a consulta.

            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos os resultados como um array associativo.
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage(); // Exibe uma mensagem de erro se a execução da consulta falhar.
            return array(); // Retorna um array vazio em caso de erro.
        }
    }

    // Função para selecionar um adotante com base no CPF
    function selecionar_Adotante_Por_CPF($cpf)
    {
        $conn = conectar(); // Estabelece uma conexão com o banco de dados.
        $sql = "SELECT * FROM ado_block WHERE cpf = :cpf"; // Consulta SQL para selecionar um adotante com base no CPF.

        try {
            $stmt = $conn->prepare($sql); // Prepara a consulta SQL.
            $stmt->bindParam(':cpf', $cpf); // Vincula o parâmetro :cpf à variável $cpf.
            $stmt->execute(); // Executa a consulta.

            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos os resultados como um array associativo.
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage(); // Exibe uma mensagem de erro se a execução da consulta falhar.
            return array(); // Retorna um array vazio em caso de erro.
        }
    }

    // Função para excluir um adotante bloqueado do banco de dados
    function excluir_Adotante($cpf)
    {
        $conn = conectar(); // Estabelece uma conexão com o banco de dados.

        $sql = "DELETE FROM ado_block WHERE cpf = :cpf"; // Consulta SQL para excluir um adotante bloqueado.

        $stmt = $conn->prepare($sql); // Prepara a consulta SQL.
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_INT); // Vincula o parâmetro :cpf à variável $cpf assegurando que seja tratado como inteiro.

        try {
            if ($stmt->execute()) {
                echo "<script language='javascript' type='text/javascript'>
              alert('Adotante bloqueado excluído com sucesso');
              window.location.href='../View/adotantes_cadastrados.php';
              </script>"; // Exibe uma mensagem de sucesso e redireciona para a página de adotantes cadastrados em caso de sucesso na execução da consulta.
            } else {
                echo "Erro ao excluir o adotante bloqueado: " . $stmt->errorInfo()[2]; // Exibe uma mensagem de erro se a execução da consulta falhar.
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage(); // Exibe uma mensagem de erro se ocorrer uma exceção do tipo PDOException.
        }
    }

    // Função para criar equipes no banco de dados
    function criar_Equipes($nome_da_equipe, $nome_do_voluntario_lider, $voluntarios)
    {
        $conn = conectar(); // Estabelece uma conexão com o banco de dados.

        // Primeiro, insira o líder da equipe na tabela de voluntários
        $sqlLider = "INSERT INTO voluntarios (nome) VALUES (:nome_do_voluntario_lider)";
        $stmtLider = $conn->prepare($sqlLider);
        $stmtLider->bindParam(':nome_do_voluntario_lider', $nome_do_voluntario_lider, PDO::PARAM_STR);

        // Em seguida, insira os voluntários na tabela de voluntários e obtenha seus IDs
        $voluntario_ids = [];
        foreach ($voluntarios as $voluntario) {
            $sqlVoluntario = "INSERT INTO voluntarios (nome) VALUES (:nome_do_voluntario)";
            $stmtVoluntario = $conn->prepare($sqlVoluntario);
            $stmtVoluntario->bindParam(':nome_do_voluntario', $voluntario, PDO::PARAM_STR);
            if ($stmtVoluntario->execute()) {
                $voluntario_ids[] = $conn->lastInsertId();
            } else {
                echo "Erro ao cadastrar voluntário: " . $stmtVoluntario->errorInfo()[2];
                return; // Se houver um erro, pare a execução
            }
        }

        // Agora, insira a equipe na tabela de equipes, relacionando-a com os líder e voluntários
        $sqlEquipe = "INSERT INTO equipes (nome_da_equipe, nome_do_voluntario_lider, nome_do_voluntario_1, nome_do_voluntario_2, nome_do_voluntario_3, nome_do_voluntario_4, nome_do_voluntario_5) VALUES (:nome_da_equipe, :nome_do_voluntario_lider, :nome_do_voluntario_1, :nome_do_voluntario_2, :nome_do_voluntario_3, :nome_do_voluntario_4, :nome_do_voluntario_5)";

        $stmtEquipe = $conn->prepare($sqlEquipe);
        $stmtEquipe->bindParam(':nome_da_equipe', $nome_da_equipe, PDO::PARAM_STR);
        $stmtEquipe->bindParam(':nome_do_voluntario_lider', $voluntario_ids[0], PDO::PARAM_INT); // Usar o ID do líder
        for ($i = 0; $i < 5; $i++) {
            if ($i < count($voluntario_ids)) {
                $stmtEquipe->bindParam(":nome_do_voluntario_" . ($i + 1), $voluntario_ids[$i], PDO::PARAM_INT);
            } else {
                $stmtEquipe->bindValue(":nome_do_voluntario_" . ($i + 1), null, PDO::PARAM_NULL); // Se não houver voluntário, defina como NULL
            }
        }

        if ($stmtEquipe->execute()) {
            echo "<script language='javascript' type='text/javascript'>
              alert('Equipe cadastrada com sucesso');
              window.location.href='../View/equipes_cadastradas.php';
              </script>"; // Exibe uma mensagem de sucesso e redireciona para a página de equipes cadastradas em caso de sucesso na execução da consulta.
        } else {
            echo "Erro ao cadastrar a equipe: " . $stmtEquipe->errorInfo()[2]; // Exibe uma mensagem de erro se a execução da consulta falhar.
        }
    }

    // Função para excluir uma equipe do banco de dados
    function excluir_Equipe($cod_equipe)
    {
        $conn = conectar(); // Estabelece uma conexão com o banco de dados.

        $sql = "DELETE FROM equipes WHERE id = :id"; // Consulta SQL para excluir uma equipe.

        $stmt = $conn->prepare($sql); // Prepara a consulta SQL.
        $stmt->bindParam(':id', $cod_equipe, PDO::PARAM_INT); // Vincula o parâmetro :id à variável $cod_equipe assegurando que seja tratado como inteiro.

        try {
            if ($stmt->execute()) {
                echo "<script language='javascript' type='text/javascript'>
                  alert('Equipe excluída com sucesso');
                  window.location.href='../View/equipes_cadastradas.php';
                  </script>"; // Exibe uma mensagem de sucesso e redireciona para a página de equipes cadastradas em caso de sucesso na execução da consulta.
            } else {
                echo "Erro ao excluir a equipe: " . $stmt->errorInfo()[2]; // Exibe uma mensagem de erro se a execução da consulta falhar.
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage(); // Exibe uma mensagem de erro se ocorrer uma exceção do tipo PDOException.
        }
    }

    // Função para selecionar todas as equipes do banco de dados
    function selecionar_Todas_Equipes()
    {
        $conn = conectar(); // Estabelece uma conexão com o banco de dados.

        $sql = "SELECT e.id, e.nome_da_equipe, v1.nome AS nome_do_voluntario_lider, v2.nome AS nome_do_voluntario_1, v3.nome AS nome_do_voluntario_2, v4.nome AS nome_do_voluntario_3, v5.nome AS nome_do_voluntario_4, v6.nome AS nome_do_voluntario_5
    FROM equipes e
    LEFT JOIN voluntarios v1 ON e.nome_do_voluntario_lider = v1.id
    LEFT JOIN voluntarios v2 ON e.nome_do_voluntario_1 = v2.id
    LEFT JOIN voluntarios v3 ON e.nome_do_voluntario_2 = v3.id
    LEFT JOIN voluntarios v4 ON e.nome_do_voluntario_3 = v4.id
    LEFT JOIN voluntarios v5 ON e.nome_do_voluntario_4 = v5.id
    LEFT JOIN voluntarios v6 ON e.nome_do_voluntario_5 = v6.id"; // Consulta SQL para selecionar todas as equipes com os nomes dos voluntários.

        $stmt = $conn->prepare($sql); // Prepara a consulta SQL.
        $stmt->execute(); // Executa a consulta SQL.

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todas as linhas resultantes da consulta como uma matriz associativa.
    }
}
