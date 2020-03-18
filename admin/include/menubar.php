<!-- Static navbar -->
<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#navbar" aria-expanded="false"
				aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Presença Certa</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="/PresencaCerta/admin/">Home</a></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown" role="button" aria-haspopup="true"
					aria-expanded="false">Cadastros<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/PresencaCerta/admin/pages/cad_pessoa.php">Pessoas</a></li>
						<li><a href="#">Cartões RFID</a></li>
						<li><a href="#">Disciplinas</a></li>
						</ul>
						</li>
				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown" role="button" aria-haspopup="true"
					aria-expanded="false">Relatórios<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Relatório 1</a></li></ul>
				<li class="active"> <a href="#" onclick="trocar();">Escuro</a></li>
				<li><a href="/PresencaCerta/actions/dao/logout.php">Sair</a></li>
			</ul>
			</ul>
		</div>
		<!--/.nav-collapse -->
	</div>
</nav>

<style type="text/css">
.light{
background-color: white;
}
.dark{
background-color: black;
color: #ffffff;
}
</style>
<script language="javascript" type="text/javascript">
<!--
function trocar(){
var obj=document.getElementById('body');
var tab=document.getElementById('tabela');

if(obj.className=='light'){
	obj.className='dark';
}else{
	obj.className='light';
 }
/*
if(tab.className=='table table-striped'){
	tab.className='table table-striped table-dark';
}else{
	tab.className='table table-striped';
 }*/

}
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="/PresencaCerta/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/PresencaCerta/js/ie10-viewport-bug-workaround.js"></script>
 
<script src="/PresencaCerta/js/jquery-1.12.4.js"></script>
<script src="/PresencaCerta/js/jquery-ui.js"></script>
<link rel="stylesheet" href="/PresencaCerta/css/jquery-ui.css">