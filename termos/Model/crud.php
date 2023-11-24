<?php

require "conexao.php";

session_start();

class crud
{
    public function adesao($nome, $cpf, $email)
    {
        $conn = conectar();
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];

            if (empty($nome) || empty($cpf) || empty($email)) {
                $message = 'Por favor, preencha todos os campos.';
            } else {
                $sql = "INSERT INTO adesao (nome, cpf, email) VALUES (:nome, :cpf, :email)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
                $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    $message = 'Termo aceito com sucesso';
                    echo "<script>alert('Termo aceito com sucesso'); window.location.href='../View/enviado.html';</script>";
                } else {
                    echo "<script>alert('Erro! É preciso aceitar o termo de adesão');</script>";
                }
            }
        }
     }

    // function selecionar_Todos_Termos_Aceitos()
    // {
    //     $conn = conectar();
    //     $sql = "SELECT * FROM adesao";

    //     try {
    //         $stmt = $conn->prepare($sql);
    //         $stmt->execute();

    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         echo "Erro: " . $e->getMessage();
    //         return array();
    //     }
    // }

    // function selecionar_Um_Termo_Por_Cpf($cpf)
    // {
    //     $conn = conectar();
    //     $sql = "SELECT * FROM adesao WHERE cpf = :cpf";

    //     try {
    //         $stmt = $conn->prepare($sql);
    //         $stmt->bindParam(':cpf', $cpf);
    //         $stmt->execute();

    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         echo "Erro: " . $e->getMessage();
    //         return array();
    //     }
    // }

    function excluir_Termo($cpf)
    {
        $conn = conectar();

        // Primeiro, exclua da tabela 'adesao'
        $sql1 = "DELETE FROM adesao WHERE cpf = :cpf LIMIT 1";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bindParam(':cpf', $cpf, PDO::PARAM_STR);

        // Em seguida, exclua da tabela 'usuarios'
        $sql2 = "DELETE FROM usuarios WHERE cpf = :cpf";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bindParam(':cpf', $cpf, PDO::PARAM_STR);

        try {
            if ($stmt1->execute() && $stmt2->execute()) {
                echo "<script language='javascript' type='text/javascript'>
              alert('Termo de desligamento assinado com sucesso');
              window.location.href='../View/enviado.html';
              </script>";
            } else {
                echo "Erro ao excluir o usuário: " . $stmt1->errorInfo()[2];
                echo "Erro ao excluir o usuário: " . $stmt2->errorInfo()[2];
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}
