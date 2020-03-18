<?php
    include_once(dirname(__DIR__) . "../dao/pessoasDAO.php");
    
    $dao = new pessoaDAO();
    
    $item = new Pessoa();

    $dadosJSON = json_decode($_POST['dados']);

    //Verifica qual a operação que deve ser executada
    
    if($dadosJSON->operacao == "insert"){
        $item->setNome($dadosJSON->nome_pessoa);
        $item->setRfid($dadosJSON->rfid_pessoa);
        $item->setMatricula($dadosJSON->matricula_pessoa);
        $item->setOrgao($dadosJSON->orgao_expedidor_rg);
        $item->setRg($dadosJSON->rg_pessoa);
        $item->setCep($dadosJSON->cep_pessoa);
        $item->setEndereco($dadosJSON->endereco_pessoa);
        $item->setNumero($dadosJSON->numero_pessoa);
        $item->setBairro($dadosJSON->bairro_pessoa);
        $item->setCidade($dadosJSON->cidade_pessoa);
        $item->setUf($dadosJSON->uf_pessoa);
        $item->setTelefone($dadosJSON->telefone_pessoa);
        $item->setCelular($dadosJSON->celular_pessoa);
        $item->setEmail($dadosJSON->email_pessoa);

        if($dao->insertPessoa($item)){
            echo "sucesso";
        }else{
            echo "erro";
        }
    }else if($dadosJSON->operacao == "load"){

        $dados = $dao->loadAll();
        if($dados == NULL)
            echo "";
        else
            echo '{"dados":' . $dados . '}';
        
    }else if($dadosJSON->operacao == "show"){
        $dados = $dao->buscaId($dadosJSON->id_pessoa);
        echo '{"dados":' . $dados . '}';
    }else if($dadosJSON->operacao == "delete"){
        if($dados = $dao->deletePessoa($dadosJSON->id_pessoa)){
            echo 'sucesso';
        }else{
            echo 'erro';
        }
		
    }else if($dadosJSON->operacao == "edit"){
        $item->setId($dadosJSON->id_pessoa);
        $item->setNome($dadosJSON->nome_pessoa);
        $item->setMatricula($dadosJSON->matricula_pessoa);
        $item->setOrgao($dadosJSON->orgao_expedidor_rg);
        $item->setRg($dadosJSON->rg_pessoa);
        $item->setCep($dadosJSON->cep_pessoa);
        $item->setEndereco($dadosJSON->endereco_pessoa);
        $item->setNumero($dadosJSON->numero_pessoa);
        $item->setBairro($dadosJSON->bairro_pessoa);
        $item->setCidade($dadosJSON->cidade_pessoa);
        $item->setUf($dadosJSON->uf_pessoa);
        $item->setTelefone($dadosJSON->telefone_pessoa);
        $item->setCelular($dadosJSON->celular_pessoa);
        $item->setEmail($dadosJSON->email_pessoa);

        if($dao->atualizarPessoa($item)){
            echo "sucesso";
        }else{
            echo "erro";
        }
    }   
?>