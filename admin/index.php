<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Rafael Gilberto Palmeira">

    <title>Formulários</title>

    <!-- Bootstrap core CSS -->
    <link href="/presencacerta/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
	<?php
	    session_start();
        include('include/menubar.php');
        echo "olá mundo! Usuário logado: ". $_SESSION['usuarioNome'];

        if ($_SESSION['usuarioId'] == ""){
		    //loginErro é uma var global recebendo a mensagem de erro
			$_SESSION['loginErro'] = "Confirme sua identidade antes de acessar!";
		    header("Location: ../pages/login.php");
		}

	?>
   </body>
</html>