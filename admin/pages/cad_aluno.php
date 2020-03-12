<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Rafael Gilberto Palmeira">

<title>Formulários</title>

<!-- Bootstrap core CSS -->
<link href="../../css/bootstrap.min.css" rel="stylesheet">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="../../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../../css/navbar-static-top.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script type="text/javascript">

function Enter(idinput){
	if(event.keyCode == 13){
		document.getElementById(idinput).focus();
		return false;
	}
}

<!-- Máscaras -->
$('#cep_aluno').mask("00000-000")
$('#cep_aluno_edit').mask("00000-000")
$('#telefone_aluno').mask("(00) 0000-0000")
$('#telefone_aluno_edit').mask("(00) 0000-0000")
$('#celular_aluno').mask("(00) 00000-0000")
$('#celular_aluno_edit').mask("(00) 00000-0000")

<!-- WS de consultar CEP de ViaCEP (viacep.com.br) -->
function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('endereco_aluno').value=("");
    document.getElementById('bairro_aluno').value=("");
    document.getElementById('cidade_aluno').value=("");
    document.getElementById('uf_aluno').value=("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('endereco_aluno').value=(conteudo.logradouro);
        document.getElementById('bairro_aluno').value=(conteudo.bairro);
        document.getElementById('cidade_aluno').value=(conteudo.localidade);
        document.getElementById('uf_aluno').value=(conteudo.uf);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('endereco_aluno').value="buscando...";
            document.getElementById('bairro_aluno').value="buscando...";
            document.getElementById('cidade_aluno').value="buscando...";
            document.getElementById('uf_aluno').value="buscando...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};


function open_insert(){
	$("#dlg_inserir").dialog({
		resizable: false,
		height: "auto",
		width: "90%",
		modal: true,
		closable: false
	});
}

function close_insert(){
	//em caso de suceso limpa os valores dos campos de texto
	document.getElementById("matricula_aluno").value = "";
	document.getElementById("rfid_aluno").value = "";
    document.getElementById("nome_aluno").value = "";
    document.getElementById("orgao_expedidor_rg").value = "";
	document.getElementById("rg_aluno").value = "";
	document.getElementById("cep_aluno").value = "";
	document.getElementById("endereco_aluno").value = "";
	document.getElementById("numero_aluno").value = "";
	document.getElementById("bairro_aluno").value = "";
	document.getElementById("cidade_aluno").value = "";
	document.getElementById("uf_aluno").value = "";
	document.getElementById("telefone_aluno").value = "";
	document.getElementById("celular_aluno").value = "";
	document.getElementById("email_aluno").value = "";
	document.getElementById("response_error").style.display = "none";
	document.getElementById("response_ok").style.display = "none";
	document.getElementById("wait").style.display = "none";
	
	$("#dlg_inserir").dialog("close");
}

function insert(){
	//valida se campos estão preenchidos
	if(document.getElementById("nome_aluno").value == ""){
		document.getElementById("response_error").style.display = "block";
		alert("Preencha o nome do aluno!");
		return false;
	} else if(document.getElementById("rfid_aluno").value == ""){
		alert("Preencha a condição!");
		document.getElementById("response_error").style.display = "block";
		return false;
	} else if(document.getElementById("matricula_aluno").value == ""){
		alert("Preencha a matricula!");
		document.getElementById("response_error").style.display = "block";
		return false;
	} else if(document.getElementById("orgao_expedidor_rg").value == ""){
		alert("Preencha o RG!");
		document.getElementById("response_error").style.display = "block";
		return false;
	} else if(document.getElementById("rg_aluno").value == ""){
		alert("Preencha o Rg!");
		document.getElementById("response_error").style.display = "block";
		return false;
	} else if(document.getElementById("cep_aluno").value == ""){
		alert("Preencha o CEP!");
		document.getElementById("response_error").style.display = "block";
		return false;
	} else if(document.getElementById("endereco_aluno").value == ""){
		alert("Preencha o endereço!");
		document.getElementById("response_error").style.display = "block";
		return false;
	}

	//insere
	var matricula = document.getElementById("matricula_aluno").value;
	var rfid = document.getElementById("rfid_aluno").value;
	var nome = document.getElementById("nome_aluno").value;
	var orgao = document.getElementById("orgao_expedidor_rg").value;
	var rg = document.getElementById("rg_aluno").value;
	var cep = document.getElementById("cep_aluno").value;
	var endereco = document.getElementById("endereco_aluno").value;
	var numero = document.getElementById("numero_aluno").value;
	var bairro = document.getElementById("bairro_aluno").value;
	var cidade = document.getElementById("cidade_aluno").value;
	var uf = document.getElementById("uf_aluno").value;
	var telefone = document.getElementById("telefone_aluno").value;
	var celular = document.getElementById("celular_aluno").value;
	var email = document.getElementById("email_aluno").value;

	//cria o objeto JSON
	var dados = '{"nome_aluno":"'+nome+'","rfid_aluno":"'+rfid+'","matricula_aluno":"'+matricula+'","orgao_expedidor_rg":"'+orgao+'","rg_aluno":"'+rg+'","cep_aluno":"'+cep+'","endereco_aluno":"'+endereco+'","numero_aluno":"'+numero+'","bairro_aluno":"'+bairro+'","cidade_aluno":"'+cidade+'","uf_aluno":"'+uf+'","telefone_aluno":"'+telefone+'","celular_aluno":"'+celular+'","email_aluno":"'+email+'","operacao":"insert"}';
	document.getElementById("response_error").style.display="none";
	document.getElementById("response_ok").style.display="none";
	document.getElementById("wait").style.display="block";

    console.log(dados);
	 //criar o AJAX
	 $.ajax({
		 type: "POST",
		 url: "../actions/aluno_actions.php",
		 data: "dados="+dados
	 }).done(function(data){
		 if(String(data).replace("\n","").replace("\r","") == "sucesso"){
			document.getElementById("wait").style.display = "none";
			document.getElementById("response_ok").style.display = "block";
			carregaDados();
		 }
	 }).fail(function(data){
		 if(String(data).replace("\n","").replace("\r","") == "erro"){
				document.getElementById("wait").style.display = "none";
				document.getElementById("response_error").style.display = "block";
			 }
	 }); 
}
function carregaDados(){
	var dados = '{"operacao":"load"}';

	$.ajax({
		type:"POST",
		url: "../actions/aluno_actions.php",
		data: "dados=" + dados
	})
	.done(function (data){
		//Faz parser do JSON
		//console.log(data);
		var vetor = JSON.parse(data);

		var tabela = document.getElementById("tabela");
		tabela.innerHTML = "";

		for(i = 0; i < vetor.dados.length;i++){
			//cria as linhas
			var linha = tabela.insertRow(i);

			//cria a coluna 0 e atribui o valor
			var coluna = linha.insertCell(0);
			coluna.innerHTML = vetor.dados[i].id_aluno;

			//cria a coluna 1 e atribui o valor
			coluna = linha.insertCell(1);
			coluna.innerHTML = vetor.dados[i].nome_aluno;

			//cria a coluna 2 e atribui o valor
			coluna = linha.insertCell(2);
			coluna.innerHTML = vetor.dados[i].matricula_aluno;

			//cria a coluna 3 e atribui o valor
			coluna = linha.insertCell(3);
			coluna.innerHTML = vetor.dados[i].rg_aluno;

			//cria a coluna 4 e atribui o valor
			coluna = linha.insertCell(4);
			coluna.innerHTML = vetor.dados[i].cep_aluno;

			//cria a coluna 5 e atribui o valor
			coluna = linha.insertCell(5);
			coluna.innerHTML = vetor.dados[i].numero_aluno;

			//cria a coluna 6 e atribui o valor
			coluna = linha.insertCell(6);
			coluna.innerHTML = vetor.dados[i].telefone_aluno;

			//cria a coluna 7 e atribui os botões
			coluna = linha.insertCell(7);
			coluna.innerHTML = '<a class="btn btn-success btn-xs" onclick="show_item(' + vetor.dados[i].id_aluno  + ')"> Detalhes </a>'+
							   '<a class="btn btn-warning btn-xs" onclick="open_edit(' + vetor.dados[i].id_aluno  + ')"> Editar </a>'+
							   '<a class="btn btn-danger btn-xs"'+
							   'onclick="confirme_delete('+vetor.dados[i].id_aluno+',\''+vetor.dados[i].nome_aluno+'\')"> Excluir </a>';
		}
	})
	.fail(function (data){
	})

	//para previnir que haja um recarregamento da pg a função deve retornar falso
	return false;
}

function show_item(item_id){
	var dados = '{"operacao":"show","id_aluno" : "' + item_id + '"}'
	$.ajax({
        type: "POST",
        url: "../actions/aluno_actions.php",
        data: "dados=" +  dados
    })
    .done(function(data){
    	  var arr = JSON.parse(data);
    	  	document.getElementById("id_aluno_ver").value = arr.dados[0].id_aluno;
     	    document.getElementById("nome_aluno_ver").value = arr.dados[0].nome_aluno;
     	    document.getElementById("rfid_aluno_ver").value = arr.dados[0].rfid_aluno;
    		document.getElementById("matricula_aluno_ver").value = arr.dados[0].matricula_aluno;
    		document.getElementById("orgao_expedidor_rg_ver").select = arr.dados[0].orgao_expedidor_rg;
    		document.getElementById("rg_aluno_ver").value = arr.dados[0].rg_aluno;
    		document.getElementById("cep_aluno_ver").value = arr.dados[0].cep_aluno;
    		document.getElementById("endereco_aluno_ver").value = arr.dados[0].endereco_aluno;
    		document.getElementById("numero_aluno_ver").value = arr.dados[0].numero_aluno;
    		document.getElementById("bairro_aluno_ver").value = arr.dados[0].bairro_aluno;
    		document.getElementById("cidade_aluno_ver").value = arr.dados[0].cidade_aluno;
    		document.getElementById("uf_aluno_ver").value = arr.dados[0].uf_aluno;
    		document.getElementById("telefone_aluno_ver").value = arr.dados[0].telefone_aluno;
    		document.getElementById("celular_aluno_ver").value = arr.dados[0].celular_aluno;
    		document.getElementById("email_aluno_ver").value = arr.dados[0].email_aluno;

    	  $("#dlg_show").dialog({
  	        resizable: false,
  	        height: "auto",
  	        width: "auto",
  	        modal: true,
  	        closable:false
  	      });
    	  
    })
    .fail(function() {
    
    });

    //para previnir que haja um recarregamento da pg a função deve retornar falso
    return false;
}

function close_view(){
	$("#dlg_show").dialog("close");
}

//exibe janela com id e nome p confirmar delete
function confirme_delete(id_aluno,nome_aluno){

	document.getElementById("id_aluno_del").value = id_aluno;
	document.getElementById("nome_aluno_del").value = nome_aluno;

	document.getElementById("btn_excluir").onclick= function delete_aluno(){
		var dados = '{"operacao":"delete","id_aluno" : "' + id_aluno + '"}'
		document.getElementById("response_error_delete").style.display="none";
		document.getElementById("response_ok_delete").style.display="none";
		document.getElementById("wait_delete").style.display="block";
		
		$.ajax({
	        type: "POST",
	        url: "../actions/aluno_actions.php",
	        data: "dados=" +  dados
	    })
	    .done(function(data){
	    	 if(String(data).replace("\n","").replace("\r","") == "sucesso"){
	    		document.getElementById("wait_delete").style.display = "none";
	    		document.getElementById("response_ok_delete").style.display = "block";
	    		document.getElementById("btn_excluir").innerHTML="Fechar";
	    		document.getElementById("btn_excluir").onclick=cancel_delete();
	    		carregaDados();
		   	 }
	    })
	    .fail(function() {
	    	document.getElementById("wait_delete").style.display = "none";
			document.getElementById("response_error_delete").style.display = "block";
	    });
	}
	
	$("#dlg_delete").dialog({
		resizable: false,
		height: "auto",
		width: "auto",
		modal: true,
		closable: false
	});
}

function cancel_delete(){
	$("#dlg_delete").dialog("close");
}

function open_edit(item_id){
  //busca dados do BD pois devem ser exibidos os dados exatos do BD

	var dados = '{"operacao":"show","id_aluno" : "' + item_id + '"}'
	$.ajax({
        type: "POST",
        url: "../actions/aluno_actions.php",
        data: "dados=" +  dados
    })
    .done(function(data){

    	  var arr = JSON.parse(data);
    	  	document.getElementById("id_aluno_edit").value = arr.dados[0].id_aluno;
     	    document.getElementById("nome_aluno_edit").value = arr.dados[0].nome_aluno;
     	    document.getElementById("rfid_aluno_edit").value = arr.dados[0].rfid_aluno;
    		document.getElementById("matricula_aluno_edit").value = arr.dados[0].matricula_aluno;
    		document.getElementById("orgao_expedidor_rg_edit").select = arr.dados[0].orgao_expedidor_rg;
    		document.getElementById("rg_aluno_edit").value = arr.dados[0].rg_aluno;
    		document.getElementById("cep_aluno_edit").value = arr.dados[0].cep_aluno;
    		document.getElementById("endereco_aluno_edit").value = arr.dados[0].endereco_aluno;
    		document.getElementById("numero_aluno_edit").value = arr.dados[0].numero_aluno;
    		document.getElementById("bairro_aluno_edit").value = arr.dados[0].bairro_aluno;
    		document.getElementById("cidade_aluno_edit").value = arr.dados[0].cidade_aluno;
    		document.getElementById("uf_aluno_edit").value = arr.dados[0].uf_aluno;
    		document.getElementById("telefone_aluno_edit").value = arr.dados[0].telefone_aluno;
    		document.getElementById("celular_aluno_edit").value = arr.dados[0].celular_aluno;
    		document.getElementById("email_aluno_edit").value = arr.dados[0].email_aluno;

    	  
    	  $("#dlg_editar").dialog({
  	        resizable: false,
  	        height: "auto",
  	        width: "auto",
  	        modal: true,
  	        closable:false
  	      });
    })
    .fail(function() {
    
    });	
}

function close_edit(){
	document.getElementById("wait_edit").style.display = "none";
	document.getElementById("response_ok_edit").style.display = "none";
	document.getElementById("btn_editar").style.display="block";
    document.getElementById("btnCancelEdit").style.display="block";
	$("#dlg_editar").dialog("close");
}

function edit_aluno(){
	var id = document.getElementById("id_aluno_edit").value;
	var nome = document.getElementById("nome_aluno_edit").value;
	var rfid = document.getElementById("rfid_aluno_edit").value;
	var matricula = document.getElementById("matricula_aluno_edit").value;
	var orgao = document.getElementById("orgao_expedidor_rg_edit").value;
	var rg = document.getElementById("rg_aluno_edit").value;
	var cep = document.getElementById("cep_aluno_edit").value;
	var endereco = document.getElementById("endereco_aluno_edit").value;
	var numero = document.getElementById("numero_aluno_edit").value;
	var bairro = document.getElementById("bairro_aluno_edit").value;
	var cidade = document.getElementById("cidade_aluno_edit").value;
	var uf = document.getElementById("uf_aluno_edit").value;
	var telefone = document.getElementById("telefone_aluno_edit").value;
	var celular = document.getElementById("celular_aluno_edit").value;
	var email = document.getElementById("email_aluno_edit").value;

	//cria o objeto JSON
	var dados = '{"id_aluno":"'+id+'", "nome_aluno":"'+nome+'","rfid_aluno":"'+rfid+'","matricula_aluno":"'+matricula+'","orgao_expedidor_rg":"'+orgao+'","rg_aluno":"'+rg+'","cep_aluno":"'+cep+'","endereco_aluno":"'+endereco+'","numero_aluno":"'+numero+'","bairro_aluno":"'+bairro+'","cidade_aluno":"'+cidade+'","uf_aluno":"'+uf+'","telefone_aluno":"'+telefone+'","celular_aluno":"'+celular+'","email_aluno":"'+email+'","operacao":"edit"}';
	$.ajax({
        type: "POST",
        url: "../actions/aluno_actions.php",
        data: "dados=" +  dados
    })
    .done(function(data){
    	 if(String(data).replace("\n","").replace("\r","") == "sucesso"){
 			document.getElementById("wait_edit").style.display = "none";
 			document.getElementById("response_ok_edit").style.display = "block";
 			carregaDados();
 			document.getElementById("btn_editar").style.display="none";
 			document.getElementById("btnCancelEdit").style.display="none";
 		 }
    })
    .fail(function() {
    	if(String(data).replace("\n","").replace("\r","") == "erro"){
			document.getElementById("wait_edit").style.display = "none";
			document.getElementById("response_error_edit").style.display = "block";
		 }
    });	 
}

</script>
</head>
<body onload="carregaDados();" id="body" class="light">

<?php
include_once ('../include/menubar.php');
?>
<a href="../../actions/dao/logout.php">Sair</a>

<!-- janela para editar -->
    <div id="dlg_editar" title="Editar Aluno" style="display: none">
		<form name="form" action="POST">
			<div class="row">
				<div class="form-group col-md-1">
					<label for="id_aluno_edit">Aluno</label> <input
						type="text" class="form-control" id="id_aluno_edit"
						placeholder="ID" id="name" name="nome_aluno" disabled>
				</div>
				<div class="form-group col-md-2">
					<label for="matricula_aluno_edit">Matricula</label> <input
						type="text" class="form-control" id="matricula_aluno_edit"
						placeholder="Matricula" name="nome_aluno" onkeyup="Enter('rfid_aluno_edit');" required>
				</div>
				<div class="form-group col-md-2">
					<label for="rfid_aluno_edit">TagRFID</label> <input
					    type="text" class="form-control" id="rfid_aluno_edit"
					    placeholder="RFID"	name="nome_aluno" onkeyup="Enter('nome_aluno_edit');" required>
				</div>
				<div class="form-group col-md-7">
					<label for="nome_aluno_edit">Nome</label> <input
						type="text" class="form-control" id="nome_aluno_edit"
						placeholder="Nome" id="name" name="nome_aluno" onkeyup="Enter('orgao_expedidor_rg_edit');" required>
				</div>
			</div>
			<div class="row">
                <div class="form-group col-md-2">
					<label for="orgao_expedidor_rg_edit">RG</label>
					    <select id="orgao_expedidor_rg_edit" class="form-control">
                        <option value="ac">Acre</option>
                        <option value="al">Alagoas</option>
                        <option value="ap">Amapá</option>
                        <option value="am">Amazonas</option>
                        <option value="ba">Bahia</option>
                        <option value="ce">Ceará</option>
                        <option value="df">Distrito Federal</option>
                        <option value="es">Espírito Santo</option>
                        <option value="go">Goiás</option>
                        <option value="ma">Maranhão</option>
                        <option value="mt">Mato Grosso</option>
                        <option value="ms">Mato Grosso do Sul</option>
                        <option value="mg">Minas Gerais</option>
                        <option value="pa">Pará</option>
                        <option value="pb">Paraíba</option>
                        <option value="pr">Paraná</option>
                        <option value="pe">Pernambuco</option>
                        <option value="pi">Piauí</option>
                        <option value="rj">Rio de Janeiro</option>
                        <option value="rn">Rio Grande do Norte</option>
                        <option value="rs">Rio Grande do Sul</option>
                        <option value="ro">Rondônia</option>
                        <option value="rr">Roraima</option>
                        <option value="sc">Santa Catarina</option>
                        <option value="sp">São Paulo</option>
                        <option value="se">Sergipe</option>
                        <option value="to">Tocantins</option>
                        </select>
				</div>
				<div class="form-group col-md-2">
					<label for="rg_aluno_edit">RG</label> <input
						type="text" class="form-control" id="rg_aluno_edit"
						placeholder="RG" name="rg_aluno" onkeyup="Enter('cep_aluno_edit');" required>
				</div>
				<div class="form-group col-md-2">
					<label for="cep_aluno_edit">CEP</label> <input
						type="text" class="form-control" id="cep_aluno_edit"
						placeholder="CEP" name="cep_aluno" onkeyup="Enter('endereco_aluno_edit');" required>
				</div>
                <div class="form-group col-md-5">
					<label for="endereco_aluno_edit">Endereço</label> <input
						type="text" class="form-control" id="endereco_aluno_edit"
						placeholder="Endereço" name="endereco_aluno" onkeyup="Enter('numero_aluno_edit');" required>
				</div>
				<div class="form-group col-md-1">
					<label for="numero_aluno_edit">Número</label> <input
						type="text" class="form-control" id="numero_aluno_edit"
						placeholder="Nº" name="numero_aluno" onkeyup="Enter('bairro_aluno_edit');" required>
				</div>
			</div>
			<div class="row">
			    <div class="form-group col-md-3">
					<label for="bairro_aluno_edit">Bairro</label> <input
						type="text" class="form-control" id="bairro_aluno_edit"
						placeholder="Bairro" name="bairro_aluno" onkeyup="Enter('cidade_aluno_edit');" required>
				</div>
				<div class="form-group col-md-3">
					<label for="cidade_aluno_edit">Cidade</label> <input
						type="text" class="form-control" id="cidade_aluno_edit"
						placeholder="Cidade" name="cidade_aluno" onkeyup="Enter('uf_aluno_edit');" required>
				</div>
				<div class="form-group col-md-1">
					<label for="uf_aluno_edit">UF</label> <input
						type="text" class="form-control" id="uf_aluno_edit"
						placeholder="UF" name="uf_aluno" maxlength="2" onkeyup="Enter('telefone_aluno_edit');" required>
				</div>
				<div class="form-group col-md-2">
					<label for="telefone_aluno_edit">Telefone</label> <input
						type="text" class="form-control" id="telefone_aluno_edit"
						placeholder="DDD + número" name="cep_aluno" onkeyup="Enter('celular_aluno_edit');">
				</div>
				<div class="form-group col-md-2">
					<label for="celular_aluno_edit">Celular</label> <input
						type="text" class="form-control" id="celular_aluno_edit"
						placeholder="(DDD) número" name="celular_aluno"  onkeyup="Enter('email_aluno_edit');">
				</div>
			</div>
            <div class="row">
			    <div class="form-group col-md-4">
					<label for="email_aluno_edit">Endereço E-mail</label> <input
						type="email" class="form-control" id="email_aluno_edit"
						placeholder="exemplo@dominio.com" name="email_aluno" required>
				</div>
			</div>
			<hr>
			<div class="row" id="response_error_edit" style="display: none">
				<div class="alert alert-danger" role="alert">
					<span id="error_message"></span>
				</div>
			</div>

			<div class="row" id="response_ok_edit" style="display: none">
				<div class="alert alert-success" role="alert">
					<span>Aluno alterado com sucesso!</span>
				</div>
			</div>


			<div class="row" id="wait_edit" style="display: none">
				<div class="alert alert-info" role="alert">
					<span>Por Favor, Aguarde... </span>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-md-12">
					<button type="button" class="btn btn-primary"
						onclick="edit_aluno();" id="btn_editar">Editar</button>
					<button type="button" class="btn btn-danger"
						onclick="close_edit();" id="btnCancelEdit">Cancelar</button>
					<button type="button" class="btn btn-default" id="btnFecharEdit"
						onclick="close_edit();">Fechar</button>
				</div>
			</div>

		</form>
	</div>

<!-- janela para inativar -->
	<div id="dlg_delete" title="Inativar Aluno" style="display: none">
		<form name="form_delete" action="POST">
			<div class="row">
				<div class="form-group col-md-12">
					<label for="id_aluno_del">Id. Aluno</label> <input
						type="text" class="form-control" id="id_aluno_del" id="name"
						name="nome_aluno" disabled>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-12">
					<label for="nome_aluno_del">Nome</label> <input
						type="text" class="form-control" id="nome_aluno_del"
						id="name" name="nome_aluno" disabled>
				</div>
			</div>
			<div class="row" id="response_error_delete" style="display: none">
				<div class="alert alert-danger" role="alert">
					<span>Erro ao excluir Aluno</span>
				</div>
			</div>
			<div class="row" id="response_ok_delete" style="display: none">
				<div class="alert alert-success" role="alert">
					<span>Aluno excluído com sucesso!</span>
				</div>
			</div>
			<div class="row" id="wait_delete" style="display: none">
				<div class="alert alert-info" role="alert">
					<span>Por favor, aguarde... </span>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-12">
					<button type="button" class="btn btn-danger" id="btn_excluir">Excluir</button>
					<button type="button" class="btn btn-default"
						onclick="cancel_delete();">Cancelar</button>

				</div>
			</div>
		</form>
	</div>
	
<!-- janela para cadastrar -->
	<div id="dlg_inserir" title="Cadastrar novo aluno"
		style="display: none">
		<form name="form" action="POST">
			<div class="row">
			    <div class="form-group col-md-2">
					<label for="matricula_aluno">Matricula</label> <input
						type="text" class="form-control" id="matricula_aluno"
						placeholder="Matricula" name="nome_aluno" onkeyup="Enter('rfid_aluno');" required>
				</div>
				<div class="form-group col-md-2">
					<label for="rfid_aluno">TagRFID</label> <input
					    type="text" class="form-control" id="rfid_aluno"
					    placeholder="RFID"	name="nome_aluno" onkeyup="Enter('nome_aluno');" required>
				</div>
				<div class="form-group col-md-8">
					<label for="nome_aluno">Nome</label> <input type="text"
						class="form-control" id="nome_aluno" placeholder="Nome"
						id="name" name="nome_aluno" onkeyup="Enter('orgao_expedidor_rg');" required>
				</div>
			</div>
			<div class="row">
                 <div class="form-group col-md-2">
					<label for="orgao_expedidor_rg">RG</label>
					    <select id="orgao_expedidor_rg" class="form-control" onkeyup="Enter('rg_aluno');" required>
                        <option value="ac">Acre</option>
                        <option value="al">Alagoas</option>
                        <option value="ap">Amapá</option>
                        <option value="am">Amazonas</option>
                        <option value="ba">Bahia</option>
                        <option value="ce">Ceará</option>
                        <option value="df">Distrito Federal</option>
                        <option value="es">Espírito Santo</option>
                        <option value="go">Goiás</option>
                        <option value="ma">Maranhão</option>
                        <option value="mt">Mato Grosso</option>
                        <option value="ms">Mato Grosso do Sul</option>
                        <option value="mg">Minas Gerais</option>
                        <option value="pa">Pará</option>
                        <option value="pb">Paraíba</option>
                        <option value="pr">Paraná</option>
                        <option value="pe">Pernambuco</option>
                        <option value="pi">Piauí</option>
                        <option value="rj">Rio de Janeiro</option>
                        <option value="rn">Rio Grande do Norte</option>
                        <option value="rs">Rio Grande do Sul</option>
                        <option value="ro">Rondônia</option>
                        <option value="rr">Roraima</option>
                        <option value="sc">Santa Catarina</option>
                        <option value="sp">São Paulo</option>
                        <option value="se">Sergipe</option>
                        <option value="to">Tocantins</option>
                        </select>
				</div>
				<div class="form-group col-md-2">
					<label for="rg_aluno">RG</label> <input type="text"
						class="form-control" id="rg_aluno" placeholder="RG"
						name="rg_aluno" onkeyup="Enter('cep_aluno');" required>
				</div>
				<div class="form-group col-md-2">
					<label for="cep_aluno">CEP</label> <input type="text"
						class="form-control" id="cep_aluno" placeholder="CEP"
						name="cep_aluno" size="10" maxlength="9" onblur="pesquisacep(this.value);" onkeyup="Enter('endereco_aluno');" required>
				</div>
				<div class="form-group col-md-5">
					<label for="endereco_aluno">Endereço</label> <input
						type="text" class="form-control" id="endereco_aluno"
						placeholder="Endereço" name="nome_aluno" onkeyup="Enter('numero_aluno');" required>
				</div>
				<div class="form-group col-md-1">
					<label for="numero_aluno">Número</label> <input type="text"
						class="form-control" id="numero_aluno" placeholder="Nº"
						name="numero_aluno" onkeyup="Enter('bairro_aluno');" required>
				</div>
			</div>
			<div class="row">
                <div class="form-group col-md-3">
					<label for="bairro_aluno">Bairro</label> <input type="text"
						class="form-control" id="bairro_aluno" placeholder="Bairro"
						name="bairro_aluno" onkeyup="Enter('cidade_aluno');" required>
				</div>
				<div class="form-group col-md-4">
					<label for="cidade_aluno">Cidade</label> <input type="text"
						class="form-control" id="cidade_aluno" placeholder="Cidade"
						name="cidade_aluno" onkeyup="Enter('uf_aluno');" required>
				</div>
				<div class="form-group col-md-1">
					<label for="uf_aluno">UF</label> <input type="text"
						class="form-control" id="uf_aluno" placeholder="UF"
						name="uf_aluno" maxlength="2" onkeyup="Enter('telefone_aluno');" required>
				</div>
				<div class="form-group col-md-2">
					<label for="telefone_aluno">Telefone</label> <input type="text"
						class="form-control" id="telefone_aluno" placeholder="DDD + telefone"
						name="telefone_aluno" onkeyup="Enter('celular_aluno');">
				</div>
				<div class="form-group col-md-2">
					<label for="celular_aluno">Celular</label> <input
						type="text" class="form-control" id="celular_aluno"
						placeholder="(DDD) número" name="celular_aluno" onkeyup="Enter('email_aluno');">
				</div>
			</div>
			<div class="row">
                <div class="form-group col-md-4">
					<label for="email_aluno">Endereço E-mail</label> <input
						type="email" class="form-control" id="email_aluno"
						placeholder="exemplo@dominio.com" name="email_aluno" required>
				</div>
			</div>
			<hr>
			<div class="row" id="response_error" style="display: none">
				<div class="alert alert-danger" role="alert">
					<span id="error_message"></span>
				</div>
			</div>

			<div class="row" id="response_ok" style="display: none">
				<div class="alert alert-success" role="alert">
					<span>Aluno inserido com sucesso!</span>
				</div>
			</div>
			<div class="row" id="wait" style="display: none">
				<div class="alert alert-info" role="alert">
					<span>Por favor, aguarde... </span>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-12">
					<button type="button" class="btn btn-primary" onclick="insert();">Salvar</button>
					<button type="button" class="btn btn-danger"
						onclick="close_insert();">Cancelar</button>
					<button type="button" class="btn btn-default"
						onclick="close_insert();">Fechar</button>
				</div>
			</div>

		</form>
	</div>

<!-- janela de detalhes -->
	<div id="dlg_show" title="Aluno Selecionado" style="display: none">
		<div class="row">
			<div class="form-group col-md-1">
				<label for="id_aluno_ver">Id. Aluno</label> <input
					type="text" class="form-control" id="id_aluno_ver"
					placeholder="ID" id="name" name="id_aluno_ver" disabled>
			</div>
			<div class="form-group col-md-2">
				<label for="matricula_aluno_ver">Matricula</label> <input type="text"
					class="form-control" id="matricula_aluno_ver"
					placeholder="(vazio)" name="matricula_aluno_ver" disabled>
			</div>
			<div class="form-group col-md-2">
					<label for="rfid_aluno_ver">TagRFID</label> <input
					    type="text" class="form-control" id="rfid_aluno_ver"
					    placeholder="(vazio)"	name="nome_aluno" disabled>
			</div>
			<div class="form-group col-md-7">
				<label for="nome_aluno_ver">Nome Aluno</label> <input
					type="text" class="form-control" id="nome_aluno_ver"
					placeholder="(vazio)" id="name" name="nome_aluno_ver" disabled>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-2">
					<label for="orgao_expedidor_rg_ver">RG</label>
					    <select id="orgao_expedidor_rg_ver" class="form-control" disabled>
                        <option value="ac">Acre</option>
                        <option value="al">Alagoas</option>
                        <option value="ap">Amapá</option>
                        <option value="am">Amazonas</option>
                        <option value="ba">Bahia</option>
                        <option value="ce">Ceará</option>
                        <option value="df">Distrito Federal</option>
                        <option value="es">Espírito Santo</option>
                        <option value="go">Goiás</option>
                        <option value="ma">Maranhão</option>
                        <option value="mt">Mato Grosso</option>
                        <option value="ms">Mato Grosso do Sul</option>
                        <option value="mg">Minas Gerais</option>
                        <option value="pa">Pará</option>
                        <option value="pb">Paraíba</option>
                        <option value="pr">Paraná</option>
                        <option value="pe">Pernambuco</option>
                        <option value="pi">Piauí</option>
                        <option value="rj">Rio de Janeiro</option>
                        <option value="rn">Rio Grande do Norte</option>
                        <option value="rs">Rio Grande do Sul</option>
                        <option value="ro">Rondônia</option>
                        <option value="rr">Roraima</option>
                        <option value="sc">Santa Catarina</option>
                        <option value="sp">São Paulo</option>
                        <option value="se">Sergipe</option>
                        <option value="to">Tocantins</option>
                        </select>
			</div>
			<div class="form-group col-md-2">
				<label for="rg_aluno_ver">RG</label> <input type="text"
					class="form-control" id="rg_aluno_ver" placeholder="(vazio)"
					name="rg_aluno_ver" disabled>
			</div>
			<div class="form-group col-md-2">
				<label for="cep_aluno_ver">CEP</label> <input type="text"
					class="form-control" id="cep_aluno_ver"
					placeholder="CEP" name="cep_aluno_ver" disabled>
			</div>
			<div class="form-group col-md-5">
					<label for="endereco_aluno_ver">Endereço</label> <input
						type="text" class="form-control" id="endereco_aluno_ver"
						placeholder="Endereço" name="endereco_aluno_ver" disabled>
			</div>
			<div class="form-group col-md-1">
				<label for="numero_aluno_ver">Número</label> <input type="text"
					class="form-control" id="numero_aluno_ver"
					placeholder="Nº" name="numero_aluno_ver" disabled>
			</div>
		</div>
		<div class="row">
		    <div class="form-group col-md-3">
				<label for="bairro_aluno_ver">Bairro</label> <input type="text"
					class="form-control" id="bairro_aluno_ver"
					placeholder="Bairro" name="bairro_aluno_ver" disabled>
			</div>
			<div class="form-group col-md-3">
				<label for="cidade_aluno_ver">Cidade</label> <input type="text"
					class="form-control" id="cidade_aluno_ver"
					placeholder="Cidade" name="cidade_aluno_ver" disabled>
			</div>
			<div class="form-group col-md-1">
				<label for="uf_aluno_ver">UF</label> <input type="text"
					class="form-control" id="uf_aluno_ver"
					placeholder="UF" name="uf_aluno_ver" disabled>
			</div>
			<div class="form-group col-md-2">
				<label for="telefone_aluno_ver">Telefone</label> <input type="text"
					class="form-control" id="telefone_aluno_ver" placeholder="(vazio)"
					name="telefone_aluno_ver" disabled>
			</div>
			<div class="form-group col-md-2">
				<label for="celular_aluno_ver">Celular</label> <input
					type="text" class="form-control" id="celular_aluno_ver"
					placeholder="(vazio)" name="celular_aluno_ver" disabled>
			</div>
		</div>
		<div class="row">
		    <div class="form-group col-md-4">
				<label for="email_aluno_ver">Endereço E-mail</label> <input
					type="text" class="form-control" id="email_aluno_ver"
					placeholder="(vazio)" name="email_aluno_ver" disabled>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="form-group col-md-12">
				<button type="button" class="btn btn-primary"
					onclick="close_view();">Fechar</button>
			</div>
		</div>
	</div>

	<main class="container">
	<div class="row">
		<div class="col-sm-6">
			<h2>Alunos</h2>
		</div>
		<div class="col-sm-6 text-right h2">
			<a class="btn btn-primary" onclick="open_insert();"><i
				class="fa fa-plus"></i>Novo Aluno</a> <a
				class="btn btn-default" onclick="carregaDados();"><i
				class="fa fa-refresh"></i>Atualizar</a>
		</div>
	</div>
	
<!-- tabela -->
	<div id="list" class="row">
		<div class="table-responsive col-md-12">
			<table class="table table-striped" cellspacing="0" cellpadding="0" id="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Matricula</th>
						<th>RG</th>
						<th>CEP</th>
						<th>Nº</th>
						<th>Telefone</th>
						<th class="actions">Ações</th>
					</tr>
				</thead>
				<tbody id="tabela">
				</tbody>
			</table>
		</div>
	</div>
	<!-- /#list --> </main>
</body>
</html>
