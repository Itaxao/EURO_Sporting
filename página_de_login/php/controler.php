<?php 
	include 'connection.php';

	$usuario = $_POST['usuario'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$sql = "SHOW TABLE STATUS LIKE 'USUARIOS';";
    $resultado = $con->query($sql);
    $res = $resultado->fetch_array();

    $sql = "INSERT INTO perfil(`IDUSUARIO`,`NOMEUSUARIO`, `EMAIL`, `SENHA`) VALUES (null, '$usuario','$email','$senha')";

    if(mysqli_query($con, $sql))
    {
        echo "Cadastro concluido: :) " . $con->affected_rows . "<br>";
        header("Location: ../login.php");
    }
    else
    {
         echo "Erro: " . $sql . "<br>" . mysqli_error($con);
    }
?>