<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha

    // Verificar se o email já está cadastrado
    $sql = "SELECT * FROM perfil WHERE email = ?";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Email já cadastrado. Por favor, use outro email.";
        } else {
            // Inserir novo usuário
            $sql = "INSERT INTO perfil (usuario, email, password) VALUES (?, ?, ?)";
            $stmt = $con->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("sss", $usuario, $email, $senha);
                if ($stmt->execute()) {
                    echo "Cadastro concluído! :)";
                    header("Location: ../login.php");
                    exit();
                } else {
                    echo "Erro ao executar a inserção: " . $stmt->error;
                }
            } else {
                echo "Erro na preparação da consulta de inserção: " . $con->error;
            }
        }

        $stmt->close();
    } else {
        echo "Erro na preparação da consulta de verificação de email: " . $con->error;
    }

    $con->close();
}
?>
