<?php
    session_start();

	//Inclui a conexão com banco de dados
	include_once("../../admin/factory/connection.php");

	//Validação dos campos usuário e senha

	if((isset($_POST['email'])) && (isset($_POST['senha']))){

		//Criptografia md5
		//$senha = md5($senha);

        $usuario = ($_POST['email']);
        $senha = ($_POST['senha']);

		if (($senha == "123") && ($usuario == "123@123")){
		    header("Location: ../../admin/index.php");

		} else{
			//loginErro é uma var global recebendo a mensagem de erro
			$_SESSION['loginErro'] = "Usuário ou senha Inválidos";
			header("Location: ../../pages/login.php");
		}
	//O campo usuário e senha não preenchidos entra no else e redireciona o usuário para a página de login
	}else{
		$_SESSION['loginErro'] = "Usuário ou senha inválidos";
		header("Location: ../../pages/login.php");
	}
?>