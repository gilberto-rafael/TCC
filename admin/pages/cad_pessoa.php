<html lang="pt-br">
<head>

<?php
include_once ('../include/menubar.php');
?>
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
$('#cep_pessoa').mask("00000-000")
$('#cep_pessoa_edit').mask("00000-000")
$('#telefone_pessoa').mask("(00) 0000-0000")
$('#telefone_pessoa_edit').mask("(00) 0000-0000")
$('#celular_pessoa').mask("(00) 00000-0000")
$('#celular_pessoa_edit').mask("(00) 00000-0000")

<!-- WS de consultar CEP de ViaCEP (viacep.com.br) -->
function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('endereco_pessoa').value=("");
    document.getElementById('bairro_pessoa').value=("");
    document.getElementById('cidade_pessoa').value=("");
    document.getElementById('uf_pessoa').value=("");

    document.getElementById('endereco_pessoa_edit').value=("");
    document.getElementById('bairro_pessoa_edit').value=("");
    document.getElementById('cidade_pessoa_edit').value=("");
    document.getElementById('uf_pessoa_edit').value=("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('endereco_pessoa').value=(conteudo.logradouro);
        document.getElementById('bairro_pessoa').value=(conteudo.bairro);
        document.getElementById('cidade_pessoa').value=(conteudo.localidade);
        document.getElementById('uf_pessoa').value=(conteudo.uf);

        document.getElementById('endereco_pessoa_edit').value=(conteudo.logradouro);
        document.getElementById('bairro_pessoa_edit').value=(conteudo.bairro);
        document.getElementById('cidade_pessoa_edit').value=(conteudo.localidade);
        document.getElementById('uf_pessoa_edit').value=(conteudo.uf);
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
            document.getElementById('endereco_pessoa').value="buscando...";
            document.getElementById('bairro_pessoa').value="buscando...";
            document.getElementById('cidade_pessoa').value="buscando...";
            document.getElementById('uf_pessoa').value="buscando...";

            document.getElementById('endereco_pessoa_edit').value="buscando...";
            document.getElementById('bairro_pessoa_edit').value="buscando...";
            document.getElementById('cidade_pessoa_edit').value="buscando...";
            document.getElementById('uf_pessoa_edit').value="buscando...";

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
	document.getElementById("matricula_pessoa").value = "";
	document.getElementById("rfid_pessoa").value = "";
    document.getElementById("nome_pessoa").value = "";
    document.getElementById("orgao_expedidor_rg").value = "";
	document.getElementById("rg_pessoa").value = "";
	document.getElementById("cep_pessoa").value = "";
	document.getElementById("endereco_pessoa").value = "";
	document.getElementById("numero_pessoa").value = "";
	document.getElementById("bairro_pessoa").value = "";
	document.getElementById("cidade_pessoa").value = "";
	document.getElementById("uf_pessoa").value = "";
	document.getElementById("telefone_pessoa").value = "";
	document.getElementById("celular_pessoa").value = "";
	document.getElementById("email_pessoa").value = "";
	document.getElementById("response_error").style.display = "none";
	document.getElementById("response_ok").style.display = "none";
	document.getElementById("wait").style.display = "none";
	
	$("#dlg_inserir").dialog("close");
}

function insert(){
	//valida se campos estão preenchidos
	if(document.getElementById("nome_pessoa").value == ""){
		document.getElementById("response_error").style.display = "block";
		document.getElementById("nome_pessoa").focus();
		alert("Preencha o nome da pessoa!");
		return false;
	} else if(document.getElementById("rfid_pessoa").value == ""){
		alert("Preencha a condição!");
		document.getElementById("rfid_pessoa").focus();
		document.getElementById("response_error").style.display = "block";
		return false;
	} else if(document.getElementById("matricula_pessoa").value == ""){
		alert("Preencha a matricula!");
		document.getElementById("matricula_pessoa").focus();
		document.getElementById("response_error").style.display = "block";
		return false;
	} else if(document.getElementById("rg_pessoa").value == ""){
		alert("Preencha o RG!");
		document.getElementById("rg_pessoa").focus();
		document.getElementById("response_error").style.display = "block";
		return false;
	} else if(document.getElementById("cep_pessoa").value == ""){
		alert("Preencha o CEP!");
		document.getElementById("cep_pessoa").focus();
		document.getElementById("response_error").style.display = "block";
		return false;
	} else if(document.getElementById("endereco_pessoa").value == ""){
		alert("Preencha o endereço!");
		document.getElementById("endereco_pessoa").focus();
		document.getElementById("response_error").style.display = "block";
		return false;
	} else if(document.getElementById("email_pessoa").value == ""){
		alert("Preencha o e-mail!");
		document.getElementById("email_pessoa").focus();
		document.getElementById("response_error").style.display = "block" ;
		return false;
	}

	//insere
	var matricula = document.getElementById("matricula_pessoa").value;
	var rfid = document.getElementById("rfid_pessoa").value;
	var nome = document.getElementById("nome_pessoa").value;
	var orgao = document.getElementById("orgao_expedidor_rg").value;
	var rg = document.getElementById("rg_pessoa").value;
	var cep = document.getElementById("cep_pessoa").value;
	var endereco = document.getElementById("endereco_pessoa").value;
	var numero = document.getElementById("numero_pessoa").value;
	var bairro = document.getElementById("bairro_pessoa").value;
	var cidade = document.getElementById("cidade_pessoa").value;
	var uf = document.getElementById("uf_pessoa").value;
	var telefone = document.getElementById("telefone_pessoa").value;
	var celular = document.getElementById("celular_pessoa").value;
	var email = document.getElementById("email_pessoa").value;

	//cria o objeto JSON para infos
	var dados = '{"nome_pessoa":"'+nome+'","rfid_pessoa":"'+rfid+'","matricula_pessoa":"'+matricula+'","orgao_expedidor_rg":"'+orgao+'","rg_pessoa":"'+rg+'","cep_pessoa":"'+cep+'","endereco_pessoa":"'+endereco+'","numero_pessoa":"'+numero+'","bairro_pessoa":"'+bairro+'","cidade_pessoa":"'+cidade+'","uf_pessoa":"'+uf+'","telefone_pessoa":"'+telefone+'","celular_pessoa":"'+celular+'","email_pessoa":"'+email+'","operacao":"insert"}';
	document.getElementById("response_error").style.display="none";
	document.getElementById("response_ok").style.display="none";
	document.getElementById("wait").style.display="block";

    console.log(dados);
	 //criar o AJAX
	 $.ajax({
		 type: "POST",
		 url: "../actions/pessoa_actions.php",
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
		url: "../actions/pessoa_actions.php",
		data: "dados=" + dados
	})
	.done(function (data){
		//Faz parser do JSON
		console.log(data);
		var vetor = JSON.parse(data);

		var tabela = document.getElementById("tabela");
		tabela.innerHTML = "";

		for(i = 0; i < vetor.dados.length;i++){
			//cria as linhas
			var linha = tabela.insertRow(i);

			//cria a coluna 0 e atribui o valor
			var coluna = linha.insertCell(0);
			coluna.innerHTML = vetor.dados[i].id_pessoa;

			//cria a coluna 1 e atribui o valor
			coluna = linha.insertCell(1);
			coluna.innerHTML = vetor.dados[i].nome_pessoa;

			//cria a coluna 2 e atribui o valor
			coluna = linha.insertCell(2);
			coluna.innerHTML = vetor.dados[i].matricula_pessoa;

			//cria a coluna 3 e atribui o valor
			coluna = linha.insertCell(3);
			coluna.innerHTML = vetor.dados[i].rg_pessoa;

			//cria a coluna 4 e atribui o valor
			coluna = linha.insertCell(4);
			coluna.innerHTML = vetor.dados[i].cep_pessoa;

			//cria a coluna 5 e atribui o valor
			coluna = linha.insertCell(5);
			coluna.innerHTML = vetor.dados[i].numero_pessoa;

			//cria a coluna 6 e atribui o valor
			coluna = linha.insertCell(6);
			coluna.innerHTML = vetor.dados[i].telefone_pessoa;

			//cria a coluna 7 e atribui os botões
			coluna = linha.insertCell(7);
			coluna.innerHTML = '<a class="btn btn-success btn-xs" onclick="show_item(' + vetor.dados[i].id_pessoa  + ')"> Detalhes </a>'+
							   '<a class="btn btn-warning btn-xs" onclick="open_edit(' + vetor.dados[i].id_pessoa  + ')"> Editar </a>'+
							   '<a class="btn btn-danger btn-xs"'+
							   'onclick="confirme_delete('+vetor.dados[i].id_pessoa+',\''+vetor.dados[i].nome_pessoa+'\')"> Excluir </a>';
		}
	})
	.fail(function (data){
	})

	//para previnir que haja um recarregamento da pg a função deve retornar falso
	return false;
}

function show_item(item_id){
	var dados = '{"operacao":"show","id_pessoa" : "' + item_id + '"}'
	$.ajax({
        type: "POST",
        url: "../actions/pessoa_actions.php",
        data: "dados=" +  dados
    })
    .done(function(data){
    	  var arr = JSON.parse(data);
    	  	document.getElementById("id_pessoa_ver").value = arr.dados[0].id_pessoa;
     	    document.getElementById("nome_pessoa_ver").value = arr.dados[0].nome_pessoa;
     	    document.getElementById("rfid_pessoa_ver").value = arr.dados[0].rfid_pessoa;
    		document.getElementById("matricula_pessoa_ver").value = arr.dados[0].matricula_pessoa;
    		document.getElementById("orgao_expedidor_rg_ver").select = arr.dados[0].orgao_expedidor_rg;
    		document.getElementById("rg_pessoa_ver").value = arr.dados[0].rg_pessoa;
    		document.getElementById("cep_pessoa_ver").value = arr.dados[0].cep_pessoa;
    		document.getElementById("endereco_pessoa_ver").value = arr.dados[0].endereco_pessoa;
    		document.getElementById("numero_pessoa_ver").value = arr.dados[0].numero_pessoa;
    		document.getElementById("bairro_pessoa_ver").value = arr.dados[0].bairro_pessoa;
    		document.getElementById("cidade_pessoa_ver").value = arr.dados[0].cidade_pessoa;
    		document.getElementById("uf_pessoa_ver").value = arr.dados[0].uf_pessoa;
    		document.getElementById("telefone_pessoa_ver").value = arr.dados[0].telefone_pessoa;
    		document.getElementById("celular_pessoa_ver").value = arr.dados[0].celular_pessoa;
    		document.getElementById("email_pessoa_ver").value = arr.dados[0].email_pessoa;

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
function confirme_delete(id_pessoa,nome_pessoa){

	document.getElementById("id_pessoa_del").value = id_pessoa;
	document.getElementById("nome_pessoa_del").value = nome_pessoa;

	document.getElementById("btn_excluir").onclick= function delete_pessoa(){
		var dados = '{"operacao":"delete","id_pessoa" : "' + id_pessoa + '"}'
		document.getElementById("response_error_delete").style.display="none";
		document.getElementById("response_ok_delete").style.display="none";
		document.getElementById("wait_delete").style.display="block";
		
		$.ajax({
	        type: "POST",
	        url: "../actions/pessoa_actions.php",
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

	var dados = '{"operacao":"show","id_pessoa" : "' + item_id + '"}'
	$.ajax({
        type: "POST",
        url: "../actions/pessoa_actions.php",
        data: "dados=" +  dados
    })
    .done(function(data){

    	  var arr = JSON.parse(data);
    	  	document.getElementById("id_pessoa_edit").value = arr.dados[0].id_pessoa;
     	    document.getElementById("nome_pessoa_edit").value = arr.dados[0].nome_pessoa;
     	    document.getElementById("rfid_pessoa_edit").value = arr.dados[0].rfid_pessoa;
    		document.getElementById("matricula_pessoa_edit").value = arr.dados[0].matricula_pessoa;
    		document.getElementById("orgao_expedidor_rg_edit").select = arr.dados[0].orgao_expedidor_rg;
    		document.getElementById("rg_pessoa_edit").value = arr.dados[0].rg_pessoa;
    		document.getElementById("cep_pessoa_edit").value = arr.dados[0].cep_pessoa;
    		document.getElementById("endereco_pessoa_edit").value = arr.dados[0].endereco_pessoa;
    		document.getElementById("numero_pessoa_edit").value = arr.dados[0].numero_pessoa;
    		document.getElementById("bairro_pessoa_edit").value = arr.dados[0].bairro_pessoa;
    		document.getElementById("cidade_pessoa_edit").value = arr.dados[0].cidade_pessoa;
    		document.getElementById("uf_pessoa_edit").value = arr.dados[0].uf_pessoa;
    		document.getElementById("telefone_pessoa_edit").value = arr.dados[0].telefone_pessoa;
    		document.getElementById("celular_pessoa_edit").value = arr.dados[0].celular_pessoa;
    		document.getElementById("email_pessoa_edit").value = arr.dados[0].email_pessoa;

    	  
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

function edit_pessoa(){
	var id = document.getElementById("id_pessoa_edit").value;
	var nome = document.getElementById("nome_pessoa_edit").value;
	var rfid = document.getElementById("rfid_pessoa_edit").value;
	var matricula = document.getElementById("matricula_pessoa_edit").value;
	var orgao = document.getElementById("orgao_expedidor_rg_edit").value;
	var rg = document.getElementById("rg_pessoa_edit").value;
	var cep = document.getElementById("cep_pessoa_edit").value;
	var endereco = document.getElementById("endereco_pessoa_edit").value;
	var numero = document.getElementById("numero_pessoa_edit").value;
	var bairro = document.getElementById("bairro_pessoa_edit").value;
	var cidade = document.getElementById("cidade_pessoa_edit").value;
	var uf = document.getElementById("uf_pessoa_edit").value;
	var telefone = document.getElementById("telefone_pessoa_edit").value;
	var celular = document.getElementById("celular_pessoa_edit").value;
	var email = document.getElementById("email_pessoa_edit").value;

	//cria o objeto JSON
	var dados = '{"id_pessoa":"'+id+'", "nome_pessoa":"'+nome+'","rfid_pessoa":"'+rfid+'","matricula_pessoa":"'+matricula+'","orgao_expedidor_rg":"'+orgao+'","rg_pessoa":"'+rg+'","cep_pessoa":"'+cep+'","endereco_pessoa":"'+endereco+'","numero_pessoa":"'+numero+'","bairro_pessoa":"'+bairro+'","cidade_pessoa":"'+cidade+'","uf_pessoa":"'+uf+'","telefone_pessoa":"'+telefone+'","celular_pessoa":"'+celular+'","email_pessoa":"'+email+'","operacao":"edit"}';
	$.ajax({
        type: "POST",
        url: "../actions/pessoa_actions.php",
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


<!-- janela para editar -->
    <div id="dlg_editar" title="Editar Indivíduo" style="display: none">
		<form name="form" action="POST">
			<div class="row">
				<div class="form-group col-md-1">
					<label for="id_pessoa_edit">Pessoa</label> <input
						type="text" class="form-control" id="id_pessoa_edit"
						placeholder="ID" id="name" name="nome_pessoa" disabled>
				</div>
				<div class="form-group col-md-2">
					<label for="matricula_pessoa_edit">Matricula</label> <input
						type="text" class="form-control" id="matricula_pessoa_edit"
						placeholder="Matricula" name="nome_pessoa" onkeyup="Enter('rfid_pessoa_edit');" required>
				</div>
				<div class="form-group col-md-2">
					<label for="rfid_pessoa_edit">TagRFID</label> <input
					    type="text" class="form-control" id="rfid_pessoa_edit"
					    placeholder="RFID"	name="nome_pessoa" onkeyup="Enter('nome_pessoa_edit');" required>
				</div>
				<div class="form-group col-md-7">
					<label for="nome_pessoa_edit">Nome</label> <input
						type="text" class="form-control" id="nome_pessoa_edit"
						placeholder="Nome" id="name" name="nome_pessoa" onkeyup="Enter('orgao_expedidor_rg_edit');" required>
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
					<label for="rg_pessoa_edit">RG</label> <input
						type="text" class="form-control" id="rg_pessoa_edit"
						placeholder="RG" name="rg_pessoa" onkeyup="Enter('cep_pessoa_edit');" required>
				</div>
				<div class="form-group col-md-2">
					<label for="cep_pessoa_edit">CEP</label> <input
						type="text" class="form-control" id="cep_pessoa_edit"
						placeholder="CEP" name="cep_pessoa" onkeyup="Enter('endereco_pessoa_edit');"size="10" maxlength="9" onblur="pesquisacep(this.value);" onkeyup="Enter('endereco_pessoa_edit');" required>
				</div>
                <div class="form-group col-md-5">
					<label for="endereco_pessoa_edit">Endereço</label> <input
						type="text" class="form-control" id="endereco_pessoa_edit"
						placeholder="Endereço" name="endereco_pessoa" onkeyup="Enter('numero_pessoa_edit');" required>
				</div>
				<div class="form-group col-md-1">
					<label for="numero_pessoa_edit">Número</label> <input
						type="text" class="form-control" id="numero_pessoa_edit"
						placeholder="Nº" name="numero_pessoa" onkeyup="Enter('bairro_pessoa_edit');" required>
				</div>
			</div>
			<div class="row">
			    <div class="form-group col-md-3">
					<label for="bairro_pessoa_edit">Bairro</label> <input
						type="text" class="form-control" id="bairro_pessoa_edit"
						placeholder="Bairro" name="bairro_pessoa" onkeyup="Enter('cidade_pessoa_edit');" required>
				</div>
				<div class="form-group col-md-3">
					<label for="cidade_pessoa_edit">Cidade</label> <input
						type="text" class="form-control" id="cidade_pessoa_edit"
						placeholder="Cidade" name="cidade_pessoa" onkeyup="Enter('uf_pessoa_edit');" required>
				</div>
				<div class="form-group col-md-1">
					<label for="uf_pessoa_edit">UF</label> <input
						type="text" class="form-control" id="uf_pessoa_edit"
						placeholder="UF" name="uf_pessoa" maxlength="2" onkeyup="Enter('telefone_pessoa_edit');" required>
				</div>
				<div class="form-group col-md-2">
					<label for="telefone_pessoa_edit">Telefone</label> <input
						type="text" class="form-control" id="telefone_pessoa_edit"
						placeholder="DDD + número" name="cep_pessoa" onkeyup="Enter('celular_pessoa_edit');">
				</div>
				<div class="form-group col-md-2">
					<label for="celular_pessoa_edit">Celular</label> <input
						type="text" class="form-control" id="celular_pessoa_edit"
						placeholder="(DDD) número" name="celular_pessoa"  onkeyup="Enter('email_pessoa_edit');">
				</div>
			</div>
            <div class="row">
			    <div class="form-group col-md-4">
					<label for="email_pessoa_edit">Endereço E-mail</label> <input
						type="email" class="form-control" id="email_pessoa_edit"
						placeholder="exemplo@dominio.com" name="email_pessoa" required>
				</div>
			</div>
			<hr>
			<div class="row" id="response_error_edit" style="display: none">
				<div class="alert alert-danger" role="alert">
					<span id="error_message">Preencha corretamente os campos requeridos.</span>
				</div>
			</div>

			<div class="row" id="response_ok_edit" style="display: none">
				<div class="alert alert-success" role="alert">
					<span>Cadastro alterado com sucesso!</span>
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
						onclick="edit_pessoa();" id="btn_editar">Editar</button>
					<button type="button" class="btn btn-danger"
						onclick="close_edit();" id="btnCancelEdit">Cancelar</button>
					<button type="button" class="btn btn-default" id="btnFecharEdit"
						onclick="close_edit();">Fechar</button>
				</div>
			</div>

		</form>
	</div>

<!-- janela para inativar -->
	<div id="dlg_delete" title="Inativar Pessoa" style="display: none">
		<form name="form_delete" action="POST">
			<div class="row">
				<div class="form-group col-md-12">
					<label for="id_pessoa_del">Id. Indivíduo</label> <input
						type="text" class="form-control" id="id_pessoa_del" id="name"
						name="nome_pessoa" disabled>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-12">
					<label for="nome_pessoa_del">Nome</label> <input
						type="text" class="form-control" id="nome_pessoa_del"
						id="name" name="nome_pessoa" disabled>
				</div>
			</div>
			<div class="row" id="response_error_delete" style="display: none">
				<div class="alert alert-danger" role="alert">
					<span>Erro ao excluir cadastro</span>
				</div>
			</div>
			<div class="row" id="response_ok_delete" style="display: none">
				<div class="alert alert-success" role="alert">
					<span>Cadastro excluído com sucesso!</span>
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
	<div id="dlg_inserir" title="Cadastrar nova pessoa"
		style="display: none">
		<form name="form" action="POST">
			<div class="row">
			    <div class="form-group col-md-2">
					<label for="matricula_pessoa">Matricula</label> <input
						type="text" class="form-control" id="matricula_pessoa"
						placeholder="Matricula" name="nome_pessoa" onkeyup="Enter('rfid_pessoa');" required>
				</div>
				<div class="form-group col-md-2">
					<label for="rfid_pessoa">TagRFID</label> <input
					    type="text" class="form-control" id="rfid_pessoa"
					    placeholder="RFID"	name="nome_pessoa" onkeyup="Enter('nome_pessoa');" required>
				</div>
				<div class="form-group col-md-8">
					<label for="nome_pessoa">Nome</label> <input type="text"
						class="form-control" id="nome_pessoa" placeholder="Nome"
						id="name" name="nome_pessoa" onkeyup="Enter('orgao_expedidor_rg');" required>
				</div>
			</div>
			<div class="row">
                 <div class="form-group col-md-2">
					<label for="orgao_expedidor_rg">RG</label>
					    <select id="orgao_expedidor_rg" class="form-control" onkeyup="Enter('rg_pessoa');" required>
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
					<label for="rg_pessoa">RG</label> <input type="text"
						class="form-control" id="rg_pessoa" placeholder="RG"
						name="rg_pessoa" onkeyup="Enter('cep_pessoa');" required>
				</div>
				<div class="form-group col-md-2">
					<label for="cep_pessoa">CEP</label> <input type="text"
						class="form-control" id="cep_pessoa" placeholder="CEP"
						name="cep_pessoa" size="10" maxlength="9" onblur="pesquisacep(this.value);" onkeyup="Enter('endereco_pessoa');" required>
				</div>
				<div class="form-group col-md-5">
					<label for="endereco_pessoa">Endereço</label> <input
						type="text" class="form-control" id="endereco_pessoa"
						placeholder="Endereço" name="nome_pessoa" onkeyup="Enter('numero_pessoa');" required>
				</div>
				<div class="form-group col-md-1">
					<label for="numero_pessoa">Número</label> <input type="text"
						class="form-control" id="numero_pessoa" placeholder="Nº"
						name="numero_pessoa" onkeyup="Enter('bairro_pessoa');" required>
				</div>
			</div>
			<div class="row">
                <div class="form-group col-md-3">
					<label for="bairro_pessoa">Bairro</label> <input type="text"
						class="form-control" id="bairro_pessoa" placeholder="Bairro"
						name="bairro_pessoa" onkeyup="Enter('cidade_pessoa');" required>
				</div>
				<div class="form-group col-md-4">
					<label for="cidade_pessoa">Cidade</label> <input type="text"
						class="form-control" id="cidade_pessoa" placeholder="Cidade"
						name="cidade_pessoa" onkeyup="Enter('uf_pessoa');" required>
				</div>
				<div class="form-group col-md-1">
					<label for="uf_pessoa">UF</label> <input type="text"
						class="form-control" id="uf_pessoa" placeholder="UF"
						name="uf_pessoa" maxlength="2" onkeyup="Enter('telefone_pessoa');" required>
				</div>
				<div class="form-group col-md-2">
					<label for="telefone_pessoa">Telefone</label> <input type="text"
						class="form-control" id="telefone_pessoa" placeholder="DDD + telefone"
						name="telefone_pessoa" onkeyup="Enter('celular_pessoa');">
				</div>
				<div class="form-group col-md-2">
					<label for="celular_pessoa">Celular</label> <input
						type="text" class="form-control" id="celular_pessoa"
						placeholder="(DDD) número" name="celular_pessoa" onkeyup="Enter('email_pessoa');">
				</div>
			</div>
			<div class="row">
                <div class="form-group col-md-4">
					<label for="email_pessoa">Endereço E-mail</label> <input
						type="email" class="form-control" id="email_pessoa"
						placeholder="exemplo@dominio.com" name="email_pessoa" required>
				</div>
				<div class="form-group col-md-4">
				    <label for="foto">Foto</label>
                </div>
			</div>
			<hr>
			<div class="row" id="response_error" style="display: none">
				<div class="alert alert-danger" role="alert">
					<span id="error_message">Preencha corretamente os campos requeridos.</span>
				</div>
			</div>

			<div class="row" id="response_ok" style="display: none">
				<div class="alert alert-success" role="alert">
					<span>Cadastro inserido com sucesso!</span>
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
	<div id="dlg_show" title="Item Selecionado" style="display: none">
		<div class="row">
			<div class="form-group col-md-1">
				<label for="id_pessoa_ver">Id. Indivíduo</label> <input
					type="text" class="form-control" id="id_pessoa_ver"
					placeholder="ID" id="name" name="id_pessoa_ver" disabled>
			</div>
			<div class="form-group col-md-2">
				<label for="matricula_pessoa_ver">Matricula</label> <input type="text"
					class="form-control" id="matricula_pessoa_ver"
					placeholder="(vazio)" name="matricula_pessoa_ver" disabled>
			</div>
			<div class="form-group col-md-2">
					<label for="rfid_pessoa_ver">TagRFID</label> <input
					    type="text" class="form-control" id="rfid_pessoa_ver"
					    placeholder="(vazio)"	name="nome_pessoa" disabled>
			</div>
			<div class="form-group col-md-7">
				<label for="nome_pessoa_ver">Nome pessoa</label> <input
					type="text" class="form-control" id="nome_pessoa_ver"
					placeholder="(vazio)" id="name" name="nome_pessoa_ver" disabled>
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
				<label for="rg_pessoa_ver">RG</label> <input type="text"
					class="form-control" id="rg_pessoa_ver" placeholder="(vazio)"
					name="rg_pessoa_ver" disabled>
			</div>
			<div class="form-group col-md-2">
				<label for="cep_pessoa_ver">CEP</label> <input type="text"
					class="form-control" id="cep_pessoa_ver"
					placeholder="CEP" name="cep_pessoa_ver" disabled>
			</div>
			<div class="form-group col-md-5">
					<label for="endereco_pessoa_ver">Endereço</label> <input
						type="text" class="form-control" id="endereco_pessoa_ver"
						placeholder="Endereço" name="endereco_pessoa_ver" disabled>
			</div>
			<div class="form-group col-md-1">
				<label for="numero_pessoa_ver">Número</label> <input type="text"
					class="form-control" id="numero_pessoa_ver"
					placeholder="Nº" name="numero_pessoa_ver" disabled>
			</div>
		</div>
		<div class="row">
		    <div class="form-group col-md-3">
				<label for="bairro_pessoa_ver">Bairro</label> <input type="text"
					class="form-control" id="bairro_pessoa_ver"
					placeholder="Bairro" name="bairro_pessoa_ver" disabled>
			</div>
			<div class="form-group col-md-3">
				<label for="cidade_pessoa_ver">Cidade</label> <input type="text"
					class="form-control" id="cidade_pessoa_ver"
					placeholder="Cidade" name="cidade_pessoa_ver" disabled>
			</div>
			<div class="form-group col-md-1">
				<label for="uf_pessoa_ver">UF</label> <input type="text"
					class="form-control" id="uf_pessoa_ver"
					placeholder="UF" name="uf_pessoa_ver" disabled>
			</div>
			<div class="form-group col-md-2">
				<label for="telefone_pessoa_ver">Telefone</label> <input type="text"
					class="form-control" id="telefone_pessoa_ver" placeholder="(vazio)"
					name="telefone_pessoa_ver" disabled>
			</div>
			<div class="form-group col-md-2">
				<label for="celular_pessoa_ver">Celular</label> <input
					type="text" class="form-control" id="celular_pessoa_ver"
					placeholder="(vazio)" name="celular_pessoa_ver" disabled>
			</div>
		</div>
		<div class="row">
		    <div class="form-group col-md-4">
				<label for="email_pessoa_ver">Endereço E-mail</label> <input
					type="text" class="form-control" id="email_pessoa_ver"
					placeholder="(vazio)" name="email_pessoa_ver" disabled>
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
			<h2>Pessoas</h2>
		</div>
		<div class="col-sm-6 text-right h2">
			<a class="btn btn-primary" onclick="open_insert();"><i
				class="fa fa-plus"></i>Novo cadastro</a> <a
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