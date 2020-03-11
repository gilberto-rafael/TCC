<?php

    $host = "localhost";
	$user = "root";
	$password = "";
	$dbname = "teste";

	//Criar a conexao
	$connect = mysqli_connect($host, $user, $password, $dbname);

	if(!$connect){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		echo "Conexao realizada com sucesso";
	}

?>