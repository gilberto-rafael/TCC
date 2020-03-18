<?php
    session_start();

	//Inclui a conexão com banco de dados para login
	include_once("../factory/connection.php");

	//Validação dos campos usuário e senha

	if((isset($_POST['email'])) && (isset($_POST['senha']))){

	    //$usuario = mysqli_real_escape_string($conn, $_POST['email']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		//$senha = mysqli_real_escape_string($conn, $_POST['senha']);

        $usuario = ($_POST['email']);
        $senha = ($_POST['senha']);

        //Criptografia md5
		$senha = md5($senha);

		//Buscar na tabela usuário o usuário que corresponde com os dados digitado no formulário

		$result_usuario = "SELECT * FROM vw_login WHERE email_pessoa = '$usuario' && senha_pessoa = '$senha' LIMIT 1;";
		$resultado_usuario = mysqli_query($connect, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);


		if (empty($resultado)){
		    //loginErro é uma var global recebendo a mensagem de erro
			$_SESSION['loginErro'] = "Usuário ou senha Inválidos";
		    header("Location: ../../pages/login.php");

		} elseif (isset($resultado)){

		    $_SESSION['usuarioId'] = $resultado['id_pessoa'];
		    $_SESSION['usuarioNome'] = $resultado['nome_pessoa'];
		    $_SESSION['usuarioNiveisAcessoId'] = $resultado['nivel_acesso_id'];
		    $_SESSION['usuarioEmail'] = $resultado['email_pessoa'];
		    $_SESSION['usuarioSenha'] = $resultado['senha_pessoa'];
			header("Location: ../../admin/index.php");

		} else {
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