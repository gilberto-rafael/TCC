<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Rafael Gilberto Palmeira">

<title>Login - Presença Certa</title>

<link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">
<link href="../css/bootstrap.min.css" rel="stylesheet" >

</head>
<body id="body" >
    <header class="iheader">
        <div class="container-center" style="padding-top: 15%;">
        <form class="form-signin" method="POST" action="../actions/dao/validation.php">
            <h1 class="welcome-text">Presença Certa</h1><br>
            <label for="inputEmail" class="sr-only">Endereço E-mail</label>
            <input type="email" class="form-control" id="inputEmail"
			    placeholder="exemplo@dominio.com" name="email" required autofocus></br>

			<label for="inputPassword" class="sr-only">Senha</label>
			<input type="password" class="form-control" id="inputPassword"
				placeholder="Senha" name="senha" required></br>

			<!--Exibição das mensagens de erro-->
            <p class="text-center text-danger">
			    <?php if(isset($_SESSION['loginErro'])){
				    echo $_SESSION['loginErro'];
				    unset($_SESSION['loginErro']);
			    }?>
		    </p>
		    <!--Exibição das mensagens de sucesso-->
		    <p class="text-center text-success">
			    <?php
			    if(isset($_SESSION['logindeslogado'])){
				    echo $_SESSION['logindeslogado'];
				    unset($_SESSION['logindeslogado']);
			    }?>
		    </p>

            <button class="btn btn-lg btn-info btn-block" type="submit">Acessar</button><br>

		    <a href="#" class="welcome-a">Entre em contato</a>

        </form>
        </div>
    </header>

</body>
</hmtl>