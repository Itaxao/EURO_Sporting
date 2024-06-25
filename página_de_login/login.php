<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- Agrupamento dos elementos -->
    <main id="elementos">
        <!-- Formulario -->
        <form action="php/verificacao.php" method="post">

        <header id="titulo">
            <h2>Bem Vindo(a)!</h2>
        </header>

        <!-- Agrupamento dos inputs -->
        <section id="inputs-container">

            <!-- Email -->
            <input type="email" name="email" id="email" placeholder="emai@email.com">
            <br>
            <!-- Senha -->
            <input type="password" name="senha" id="senha" placeholder="********">
        </section>

        <!-- Botão para login -->
         <button type="submit" id="login">Login</button>

        <footer>
            <hr>
            <span> Ainda não possui uma conta? <a href="cadastro.php">Cadastre-se</a></span>
        </footer>
    </form> <!-- Fim do formulario-->
</main> <!-- Fim do agrupamento dos elementos -->

    <script src="javascript/script.js"></script>
</body>
</html>