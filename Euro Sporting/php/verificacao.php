<?php
session_start();
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Seleção do email e password
    $sql = "SELECT id, email, password FROM perfil WHERE email = ?";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($senha, $user['password'])) {
            // Se encontrou um usuário com essas credenciais, redireciona para a página inicial
            $_SESSION['user_id'] = $user['id']; // Assumindo que 'id' é a chave primária do usuário
            header("Location: ../index.php");
            exit();
        } else {
            // Se não encontrou, pode redirecionar de volta para a página de login ou mostrar uma mensagem de erro
            echo "Credenciais inválidas. Por favor, tente novamente.";
        }

        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $con->error;
    }
}
?>
