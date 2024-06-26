<?php

	$host="localhost";
	$port=3306;
	$socket="";
	$user="root";
	$password="root";
	$dbname="usuarios";

	$con = new mysqli($host, $user, $password, $dbname, $port, $socket);

	if($con->connect_error)
	{
   		echo "Desconectado! Erro: " . $con->connect_error . "<br>";
	}

?>