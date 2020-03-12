<?php

	session_start();

	//Destruir todas as sessoes feitas
	unset(
		$_SESSION['usuarioId'],
		$_SESSION['usuarioNome'],
		$_SESSION['usuarioNiveisAcessoId'],
		$_SESSION['usuarioEmail'],
		$_SESSION['usuarioSenha']
	);

	//Variavel recebe a mensagem de sucesso na tela de login
	$_SESSION['logindeslogado'] = "Desconectado com sucesso";

	//Redireciona o usuario para a página de login e exibe a mensagem
	header("Location: ../../pages/login.php");

?>