<?php
require 'connection.php';

// Garante o uso do metódo "Post" para a atualização do banco de dados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pega os valores colocados nos formulários e armazenam em uma variável
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    // Criptografa a senha no banco de dados utilizando hash
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); 

    // Define a consulta sql para selecionar todos os elementos no bd onde o email for igual o fornecido
    $sql = "SELECT * FROM perfil WHERE email = ?";
    // Prepara a consulta
    $stmt = $con->prepare($sql);

    // Primeiro verifica se a preparação da consulta foi bem sucedida
    if ($stmt) {

        // Indica o tipo como string e vincula $email como um parâmetro
        $stmt->bind_param("s", $email);

        // Executa a consulta
        $stmt->execute();

        // Cria e obtém o resultado da consulta
        $result = $stmt->get_result();

        // Verifica se o email já foi cadastrado
        if ($result->num_rows > 0) {
            echo "Email já cadastrado. Por favor, use outro email.";
        } else {

            // Insere o novo usuário
            $sql = "INSERT INTO perfil (usuario, email, password) VALUES (?, ?, ?)";

            // Prepara a consulta para a nova inserção
            $stmt = $con->prepare($sql);

            // Verifica se a preparação da consulta foi bem sucedida
            if ($stmt) {

                // Vincula $usuario,$email e $senha como parâmetros e indica o tipo deles como string
                $stmt->bind_param("sss", $usuario, $email, $senha);

                // Executa a sessão antes preparada
                if ($stmt->execute()) {

                    // Exibe uma mensagem de Conclusão
                    echo "Cadastro concluído! :)";

                    // Redireciona para a página de Login
                    header("Location: ../login.php");

                    // Encerra a conexão
                    exit();

                // Caso a consulta falhe
                } else {

                    // Exibe uma mensagem de erro ao inserir novo usuário
                    echo "Erro ao inserir novo usuário: " . $stmt->error;
                }

            // Caso a preparação da consulta para inserir falhe
            } else {

                echo "Erro na preparação da consulta de inserção: " . $con->error;
            }
        }
        
        // Fecha statement da consulta por segurança
        $stmt->close();

    // Verificação de erro na consulta de verificação do email
    } else {
        echo "Erro na preparação da consulta de verificação de email: " . $con->error;
    }

    // Fecha a conexão com o banco de dados por segurança
    $con->close();
}
?>
    