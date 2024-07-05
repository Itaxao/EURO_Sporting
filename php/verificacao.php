
    <?php
    // Starta a sessão permitindo acessar e armazenar variáveis da sessão
    session_start();
    require 'connection.php';

    // Garante o uso do metódo "Post"
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Seleção do email e password para a verificação
        $sql = "SELECT id, email, password FROM perfil WHERE email = ?";
        // Prepara o statement para a consulta sql
        $stmt = $con->prepare($sql);

        // Verifica se a conexão foi bem sucedida 
        if ($stmt) {
            // Adiciona o $email como parâmetro e define o tipo como string
            $stmt->bind_param("s", $email);
            // Executa a consulta preparada
            $stmt->execute();
            // Obtém o resultado da consulta
            $result = $stmt->get_result();
            // Obtém a primeira linha do resultado como um array
            $user = $result->fetch_assoc();

            // Verifica se o usuario foi encontrado e se a senha fornecida corresponde com a armazenada no banco de dados
            if ($user && password_verify($senha, $user['password'])) {

                // Se encontrou um usuário com esses dados, Armazena o id do usuario na variavel de sessão "user_id" 
                $_SESSION['user_id'] = $user['id'];
                // Redireciona para a página inicial do site
                header("Location: ../index.php");
                exit();
            } else {
                // Se não encontrar, redireciona de volta para a página de login e mostra uma mensagem de erro
                echo "Dados inválidos. Por favor, tente novamente.";
            }
            // Fecha o statement de consulta por segurança
            $stmt->close();
        // Caso a preparação da consulta tenha falhado imprime uma mensagem de erro
        } else {
            echo "Erro na preparação da consulta: " . $con->error;
        }
    }
    ?>
